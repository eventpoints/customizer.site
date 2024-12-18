<?php declare(strict_types=1);

namespace App\Controller\Api;

use App\Service\AuthorizationService;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;

#[OA\Tag(name: 'Authorization')]
#[Route(path: '/auth')]
class AuthorizationController extends AbstractController
{
    public function __construct(
        private readonly AuthorizationService $authorizationService
    )
    {
    }

    #[OA\QueryParameter(
        name: 'email',
        description: 'User\'s email address',
        required: true,
    )]
    #[OA\Response(
        response: Response::HTTP_OK,
        description: 'Sends an email to provided address and responds with user.',
        content: new OA\MediaType(mediaType: 'application/json')
    )]
    #[Route(path: '/login', methods: [Request::METHOD_GET])]
    public function login(#[MapQueryParameter] string $email): JsonResponse
    {
        $this->authorizationService->sentLoginEmail($email);
        return $this->json('ok');
    }

}