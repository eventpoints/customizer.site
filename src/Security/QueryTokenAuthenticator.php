<?php declare(strict_types=1);

namespace App\Security;

use App\Entity\User;
use App\Service\AuthorizationService;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;

class QueryTokenAuthenticator extends AbstractAuthenticator
{
    public function __construct(
        private readonly AuthorizationService $authorizationService,
        private readonly RouterInterface $router,
    )
    {
    }
    public function supports(Request $request): ?bool
    {
        return $request->query->has('token') && $request->getPathInfo() === $this->router->generate('app_authorization_authorize');
    }

    public function authenticate(Request $request): Passport
    {
        $token = $request->query->get('token');

        return new SelfValidatingPassport(
            new UserBadge($token, fn($token): User => $this->authorizationService->verifyToken($token))
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        return new RedirectResponse($this->router->generate('user_dashboard'));
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        return null;
    }
}