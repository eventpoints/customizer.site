<?php declare(strict_types=1);

namespace App\Controller\Api;

use App\Entity\Conversation;
use App\Entity\User;
use App\Repository\ConversationRepository;
use App\Service\AiService;
use InvalidArgumentException;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Uid\Uuid;

#[OA\Tag(name: 'Ai Generator')]
#[Route(path: '/ai-generator', methods: ['GET'])]
#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[OA\Get(security: [['BearerAuth' => []]])]
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
    #[Route(path: '/ask')]
    public function generate(#[MapQueryParameter] string $prompt, AiService $aiService, #[MapQueryParameter] ?string $id): JsonResponse
    {
        return $this->json($aiService->ask(
            requestPrompt: $prompt,
            id: $id ? Uuid::fromString($id) : Uuid::v4(),
            user: $this->getUser() instanceof User ? $this->getUser() : throw new InvalidArgumentException('User must be an instance of ' . User::class),
        ));
    }

    #[Route(path: '/conversations/{id}')]
    public function conversation(Conversation $conversation): JsonResponse
    {
        if ($conversation->getOwner() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }
        return $this->json($conversation);
    }

    #[Route(path: '/conversations')]
    public function list(ConversationRepository $conversationRepository): JsonResponse
    {
        return $this->json($conversationRepository->findBy(['owner' => $this->getUser()]), context: ['groups' => ['conversation']]);
    }
}