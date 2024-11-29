<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Code",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class CodeDto
{
    public function __construct(
        private InputDto $codeFontSize = new InputDto(label: 'Code Font Size', type: InputTypeEnum::SIZE, default: '$small-font-size', isLocked: true),
        private InputDto $codeColor = new InputDto(label: 'Code Color', type: InputTypeEnum::COLOR, default: '$pink', isLocked: true),
        private InputDto $kbdPaddingY = new InputDto(label: 'Kbd Padding Y', type: InputTypeEnum::SIZE, default: '.1875rem', isLocked: true),
        private InputDto $kbdPaddingX = new InputDto(label: 'Kbd Padding X', type: InputTypeEnum::SIZE, default: '.375rem', isLocked: true),
        private InputDto $kbdFontSize = new InputDto(label: 'Kbd Font Size', type: InputTypeEnum::SIZE, default: '$code-font-size', isLocked: true),
        private InputDto $kbdColor = new InputDto(label: 'Kbd Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-bg)', isLocked: true),
        private InputDto $kbdBg = new InputDto(label: 'Kbd Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-color)', isLocked: true),
        private InputDto $nestedKbdFontWeight = new InputDto(label: 'Nested Kbd Font Weight', type: InputTypeEnum::STRING, default: 'null', isLocked: true), // Deprecated in v5.2.0, removing in v6
        private InputDto $preColor = new InputDto(label: 'Pre Color', type: InputTypeEnum::COLOR, default: 'null', isLocked: true), // Unsure if this should be COLOR or STRING
    )
    {
    }

    public function getCodeFontSize(): InputDto
    {
        return $this->codeFontSize;
    }

    public function getCodeColor(): InputDto
    {
        return $this->codeColor;
    }

    public function getKbdPaddingY(): InputDto
    {
        return $this->kbdPaddingY;
    }

    public function getKbdPaddingX(): InputDto
    {
        return $this->kbdPaddingX;
    }

    public function getKbdFontSize(): InputDto
    {
        return $this->kbdFontSize;
    }

    public function getKbdColor(): InputDto
    {
        return $this->kbdColor;
    }

    public function getKbdBg(): InputDto
    {
        return $this->kbdBg;
    }

    public function getNestedKbdFontWeight(): InputDto
    {
        return $this->nestedKbdFontWeight;
    }

    public function getPreColor(): InputDto
    {
        return $this->preColor;
    }
}
