<?php declare(strict_types=1);

namespace App\Service;

use App\DataTransferObject\AiResponseDto;
use App\Entity\Conversation;
use App\Entity\Message;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use LLPhant\Chat\Enums\ChatRole;
use LLPhant\Chat\FunctionInfo\FunctionInfo;
use LLPhant\Chat\FunctionInfo\Parameter;
use LLPhant\Chat\OpenAIChat;
use LLPhant\OpenAIConfig;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Uid\Uuid;

readonly class AiService
{
    public function __construct(
        private Bootstrap53Factory     $bootstrap53Factory,
        private ParameterBagInterface  $parameterBag,
        private EntityManagerInterface $entityManager,
    )
    {
    }

    public function ask(string $requestPrompt, Uuid $id, User $user): AiResponseDto
    {
        $config = new OpenAIConfig();
        $config->model = 'gpt-4o-mini';
        $config->apiKey = $this->parameterBag->get('openaiApiKey');
        $chat = new OpenAIChat($config);

        $conversation = $this->buildConversation($id, $user);
        $conversation->addMessage((new Message(ChatRole::User))->setContent($requestPrompt));

        $tool = $this->getTool();
        $tool->setToolCallId(uniqid());
        $tool->jsonArgs = json_encode(['json' => '']);
        $chat->addTool($tool);

        $chat->setSystemMessage('You are a bootstrap theme generator. Generate a bootstrap theme calling the "build" tool.');
        $response = $chat->generateChat($conversation->getMessages()->map(fn(Message $message): \LLPhant\Chat\Message => $message->getMessage())->toArray());

        $conversation->addMessage((new Message(ChatRole::Assistant))->setContent($response)->setDto($this->bootstrap53Factory->getDto()));
        $this->entityManager->persist($conversation);
        $this->entityManager->flush();

        return new AiResponseDto($id, $response, $this->bootstrap53Factory->getDto());
    }

    private function getTool(): FunctionInfo
    {
        $json = new Parameter(name: 'json', type: 'string', description: 'color pallet json object for Bootstrap', format: $this->bootstrap53Factory->getFormat());

        return new FunctionInfo(
            name: 'build',
            instance: $this->bootstrap53Factory,
            description: 'Tool that accepts color parameters to build a color pallet',
            parameters: [$json],
        );
    }

    private function buildConversation(Uuid $id, User $user): Conversation
    {
        $conversation = $this->entityManager->getRepository(Conversation::class)->find($id);
        if ($conversation === null) {
            $conversation = new Conversation($id, $user);
        }
        return $conversation;
    }
}