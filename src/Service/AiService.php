<?php declare(strict_types=1);

namespace App\Service;

use App\DataTransferObject\AiResponseDto;
use App\DataTransferObject\Bootstrap53\ColorsDto;
use LLPhant\Chat\FunctionInfo\FunctionInfo;
use LLPhant\Chat\FunctionInfo\Parameter;
use LLPhant\Chat\Message;
use LLPhant\Chat\OpenAIChat;
use LLPhant\OpenAIConfig;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Serializer\SerializerInterface;

class AiService
{
    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly ColorsDtoFactory $colorsDtoFactory,
        private readonly SerializerInterface $serializer,
        private readonly ParameterBagInterface $parameterBag,
    )
    {
    }

    public function ask(string $requestPrompt):AiResponseDto
    {
        $config = new OpenAIConfig();
        $config->model = 'gpt-4o-mini';
        $config->apiKey = $this->parameterBag->get('openaiApiKey');
        $chat = new OpenAIChat($config);

        $tool =$this->getTool();
        $tool->setToolCallId(uniqid());
        $tool->jsonArgs = json_encode(['json' => '']);

        $chat->addTool($tool);
        $this->logger->info('Tool registered', ['tool' => $tool->asToolCallObject()]);

        $chat->setSystemMessage('You are a color palette generator. Generate a palette by calling the "build" tool.');
        $response = $chat->generateChat([
            Message::user('my favourite color is black what can you do?'),
            Message::assistant("I can generate color palettes for you, specifically in a format suitable for Bootstrap. You can provide me with specifications or colors you'd like to include, and I'll create a palette based on that. If you have any specific colors or themes in mind, just let me know!"),
            Message::user('build me a yellow and green color pallet with my favourite color as a primary color')
        ]);

        return new AiResponseDto($response, $this->colorsDtoFactory->getColorsDto());
    }

    private function getTool(): FunctionInfo
    {
        $json = new Parameter(name: 'json', type: 'string', description: 'color pallet json object for Bootstrap',format: $this->serializer->serialize(new ColorsDto(), 'json', ['groups' => 'compile']));

        return new FunctionInfo(
            name: 'build',
            instance: $this->colorsDtoFactory,
            description: 'Tool that accepts color parameters to build a color pallet',
            parameters: [$json],
        );
    }
}