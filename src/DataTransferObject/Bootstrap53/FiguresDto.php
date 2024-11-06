<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Figures",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class FiguresDto
{
    public function __construct(
        private InputDto $figureCaptionFontSize = new InputDto(label: 'Figure Caption Font Size', type: InputTypeEnum::SIZE, default: '$small-font-size'), // Assuming $small-font-size is a size type
        private InputDto $figureCaptionColor = new InputDto(label: 'Figure Caption Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-color)') // Assuming secondary-color is a color type
    )
    {
    }

    public function getFigureCaptionFontSize(): InputDto
    {
        return $this->figureCaptionFontSize;
    }

    public function getFigureCaptionColor(): InputDto
    {
        return $this->figureCaptionColor;
    }
}
