<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Body",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class BodyDto
{
    public function __construct(
        private InputDto $bodyTextAlign = new InputDto(label: 'Body Text Align', type: InputTypeEnum::STRING, default: 'null'),
        private InputDto $bodyColor = new InputDto(label: 'Body Color', type: InputTypeEnum::COLOR, default: '$gray-900'),
        private InputDto $bodyBg = new InputDto(label: 'Body Bg', type: InputTypeEnum::COLOR, default: '$white'),
        private InputDto $bodySecondaryColor = new InputDto(label: 'Body Secondary Color', type: InputTypeEnum::COLOR, default: 'rgba($body-color, .75)'),
        private InputDto $bodySecondaryBg = new InputDto(label: 'Body Secondary Bg', type: InputTypeEnum::COLOR, default: '$gray-200'),
        private InputDto $bodyTertiaryColor = new InputDto(label: 'Body Tertiary Color', type: InputTypeEnum::COLOR, default: 'rgba($body-color, .5)'),
        private InputDto $bodyTertiaryBg = new InputDto(label: 'Body Tertiary Bg', type: InputTypeEnum::COLOR, default: '$gray-100'),
        private InputDto $bodyEmphasisColor = new InputDto(label: 'Body Emphasis Color', type: InputTypeEnum::COLOR, default: '$black'),
    )
    {
    }

    public function getBodyTextAlign(): InputDto
    {
        return $this->bodyTextAlign;
    }

    public function getBodyColor(): InputDto
    {
        return $this->bodyColor;
    }

    public function getBodyBg(): InputDto
    {
        return $this->bodyBg;
    }

    public function getBodySecondaryColor(): InputDto
    {
        return $this->bodySecondaryColor;
    }

    public function getBodySecondaryBg(): InputDto
    {
        return $this->bodySecondaryBg;
    }

    public function getBodyTertiaryColor(): InputDto
    {
        return $this->bodyTertiaryColor;
    }

    public function getBodyTertiaryBg(): InputDto
    {
        return $this->bodyTertiaryBg;
    }

    public function getBodyEmphasisColor(): InputDto
    {
        return $this->bodyEmphasisColor;
    }
}
