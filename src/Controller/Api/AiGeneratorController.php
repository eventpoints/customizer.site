<?php declare(strict_types=1);

namespace App\Controller\Api;

use App\Service\AiService;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;

#[OA\Tag(name: 'Ai Generator')]
#[Route(path: '/ai-generator', methods: ['GET'])]
class AiGeneratorController extends AbstractController
{
    public function __construct(
    )
    {
    }

    #[OA\Parameter(
        parameter: 'prompt',
        name: 'prompt',
        description: 'Request for Ai model',
        in: 'query',
        schema: new OA\Schema(type: 'string')
    )]
    #[OA\Response(
        response: 200,
        description: '',
        content: new OA\MediaType(mediaType: 'application/json')
    )]
    #[Route(path: '/')]
    public function generate(#[MapQueryParameter]string $prompt, AiService $aiService): JsonResponse
    {
        return $this->json($aiService->ask($prompt));
    }


}