<?php declare(strict_types=1);

namespace App\Service;

use App\DataTransferObject\JwtTokenDto;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\ExpiredTokenException;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\InvalidTokenException;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTEncodeFailureException;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

readonly class AuthorizationService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private EmailService           $emailService,
        private JWTEncoderInterface    $jwtEncoder,
        private ParameterBagInterface  $parameterBag,
    )
    {
    }

    /**
     * @param string[] $roles
     */
    public function getUser(string $email, array $roles = []): User
    {
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
        if (!$user) {
            $user = new User($email);
            $user->setRoles($roles);
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }
        return $user;
    }

    /**
     * @param string $email
     * @throws TransportExceptionInterface
     */
    public function sentLoginEmail(string $email): void
    {
        $token = $this->generateToken(email: $email);
        $this->emailService->sendAuthenticationEmail(emailAddress: $email, context: [
            'emailAddress' => $email,
            'token' => $token
        ]);
    }

    public function isTokenValid(string $token): bool
    {
        if (empty($token)) {
            throw new InvalidTokenException('token is invalid');
        }

        $jwtTokenDto = $this->getJwtTokenDto(token: $token);

        return match (true) {
            $jwtTokenDto->getIss() === $this->parameterBag->get('app_secret') => true,
            default => false,
        };
    }

    public function getJwtTokenDto(string $token): JwtTokenDto
    {
        $decodedToken = $this->jwtEncoder->decode($token);
        return new JwtTokenDto(
            email: $decodedToken['email'],
            exp: $decodedToken['exp'],
            iss: $decodedToken['iss'],
            roles: $decodedToken['roles']
        );
    }

    public function verifyToken(string $token): null|User
    {
        if (!$this->isTokenValid($token)) {
            return null;
        }

        $jwtTokenDto = $this->getJwtTokenDto(token: $token);
        return $this->getUser(email: $jwtTokenDto->getEmail(), roles: $jwtTokenDto->getRoles());
    }

    public function generateToken(string $email): string
    {
        return $this->jwtEncoder->encode([
            'email' => $email,
            'roles' => ['ROLE_USER'],
            'iss' => $this->parameterBag->get('app_secret')
        ]);
    }
}