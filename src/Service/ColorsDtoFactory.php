<?php declare(strict_types=1);

namespace App\Service;

use App\DataTransferObject\Bootstrap53\ColorsDto;
use Symfony\Component\Serializer\SerializerInterface;

class ColorsDtoFactory
{
    private ColorsDto $colorsDto;

    public function __construct(
        private readonly SerializerInterface $serializer,
    )
    {
    }

    public function build(string $json): void
    {
        if (empty($json)) {
            return;
        }
        $this->colorsDto = $this->serializer->deserialize($json, ColorsDto::class, 'json');
    }

    public function getColorsDto(): ?ColorsDto
    {
        return $this->colorsDto??null;
    }
}