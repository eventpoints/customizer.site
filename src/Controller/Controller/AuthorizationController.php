<?php declare(strict_types=1);

namespace App\Controller\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;

class AuthorizationController extends AbstractController
{
    #[Route(path: '/authorize', name: 'app_authorization_authorize', methods: [Request::METHOD_GET])]
    public function authorize(#[MapQueryParameter] string $token): void
    {
        // Handled by QueryTokenAuthorization. Used only for path
    }
}