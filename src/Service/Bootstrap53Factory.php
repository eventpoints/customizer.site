<?php declare(strict_types=1);

namespace App\Service;

use App\DataTransferObject\Bootstrap53\CustomizerFormBootstrap53Dto;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class Bootstrap53Factory
{
    private CustomizerFormBootstrap53Dto $dto;

    public function __construct(
        private readonly SerializerInterface $serializer,
        private readonly NormalizerInterface $normalizer,
        private readonly EncoderInterface    $encoder,
    )
    {
    }

    public function build(string $json): void
    {
        if (empty($json)) {
            return;
        }
        $this->dto = $this->serializer->deserialize($json, CustomizerFormBootstrap53Dto::class, 'json');
    }

    public function getDto(): ?CustomizerFormBootstrap53Dto
    {
        return $this->dto ?? null;
    }

    public function getFormat(): string
    {
        $normalized = $this->normalizer->normalize(new CustomizerFormBootstrap53Dto(), context: ['groups' => 'ai-generator']);
        $this->filterAiVars($normalized);
        return $this->encoder->encode($normalized, 'json');
    }

    /**
     * @param array<string, mixed> $items
     */
    private function filterAiVars(array &$items): void
    {
        foreach ($items as $key => &$item) {
            if (is_array($item) && isset($item['isAiGenerable'])) {
                if ($item['isAiGenerable'] === true) {
                    $item['value'] ??= $item['default'] ?? null;
                    unset($item['default']);
                    unset($item['isAiGenerable']);
                } else {
                    unset($items[$key]);
                }
            }
            if (is_array($item)) {
                $this->filterAiVars($item);
            }
        }
    }
}