<?php declare(strict_types=1);

namespace App\Controller\Api;

use App\Entity\Conversation;
use App\Service\AiService;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Uid\Uuid;

#[OA\Tag(name: 'Ai Generator')]
#[Route(path: '/ai-generator', methods: ['GET'])]
class AiGeneratorController extends AbstractController
{
    public function __construct()
    {
    }

    #[OA\Parameter(
        parameter: 'prompt',
        name: 'prompt',
        description: 'Request for Ai model',
        in: 'query',
        schema: new OA\Schema(type: 'string')
    )]
    #[OA\Parameter(
        parameter: 'id',
        name: 'id',
        in: 'query',
        required: false,
        schema: new OA\Schema(type: Uuid::class)
    )]
    #[OA\Response(
        response: 200,
        description: '',
        content: new OA\MediaType(mediaType: 'application/json')
    )]
    #[Route(path: '/')]
    public function generate(#[MapQueryParameter] string $prompt, AiService $aiService, #[MapQueryParameter] ?string $id): JsonResponse
    {
        if ($id == null) {
            $id = Uuid::v4();
        } else {
            $id = Uuid::fromString($id);
        }

        return $this->json($aiService->ask($prompt, $id));
    }

    #[Route(path: '/conversation/{id}', methods: ['GET'])]
    public function conversation(Conversation $conversation): JsonResponse
    {
        return $this->json($conversation);
    }
}