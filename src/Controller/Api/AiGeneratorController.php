<?php declare(strict_types=1);

namespace App\Controller\Api;

use App\DataTransferObject\Bootstrap53\Bootstrap53Dto;
use App\DataTransferObject\Bootstrap53\ColorsDto;
use App\Service\AiService;
use App\Service\SchemaExtractor;
use App\Service\ColorsDtoFactory;
use LLPhant\Chat\FunctionInfo\FunctionBuilder;
use LLPhant\Chat\FunctionInfo\FunctionInfo;
use LLPhant\Chat\FunctionInfo\Parameter;
use LLPhant\Chat\OllamaChat;
use LLPhant\Chat\OpenAIChat;
use LLPhant\OllamaConfig;
use LLPhant\OpenAIConfig;
use OpenApi\Attributes as OA;
use Psr\Log\LoggerInterface;
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