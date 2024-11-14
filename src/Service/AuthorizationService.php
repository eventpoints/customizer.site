<?php declare(strict_types=1);

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\ExpiredTokenException;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTEncodeFailureException;
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
        private MailerInterface        $mailer,
        private Environment            $twig,
        private JWTEncoderInterface    $jwtEncoder,
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
     * @throws SyntaxError
     * @throws JWTEncodeFailureException
     * @throws TransportExceptionInterface
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function sentLoginEmail(string $email): void
    {
        $token = $this->jwtEncoder->encode([
            'email' => $email,
            'roles' => ['ROLE_USER'],
        ]);

        $emailMessage = (new Email())
            ->from('no-reply@customizer.site')
            ->to($email)
            ->subject('customizer.site - Login link')
            ->html($this->twig->render('email/userLogin.html.twig', [
                'email' => $email,
                'token' => $token
            ]));

        $this->mailer->send($emailMessage);
    }

    public function verifyToken(string $token): User
    {
        $decodedToken = $this->jwtEncoder->decode($token);
        if ($decodedToken['exp'] < time()) {
            throw new ExpiredTokenException();
        }

        return $this->getUser($decodedToken['email'], $decodedToken['roles']);
    }
}