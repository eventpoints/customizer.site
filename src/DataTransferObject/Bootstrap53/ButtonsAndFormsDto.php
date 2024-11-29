<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Buttons and Forms",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class ButtonsAndFormsDto
{
    public function __construct(
        // Input Button Padding
        private InputDto $inputBtnPaddingY = new InputDto(label: 'Input Button Padding Y', type: InputTypeEnum::SIZE, default: '.375rem', isLocked: true),
        private InputDto $inputBtnPaddingX = new InputDto(label: 'Input Button Padding X', type: InputTypeEnum::SIZE, default: '.75rem', isLocked: true),

        // Input Button Font and Size
        private InputDto $inputBtnFontFamily = new InputDto(label: 'Input Button Font Family', type: InputTypeEnum::STRING, default: 'null', isLocked: true),
        private InputDto $inputBtnFontSize = new InputDto(label: 'Input Button Font Size', type: InputTypeEnum::SIZE, default: '$font-size-base', isLocked: true),
        private InputDto $inputBtnLineHeight = new InputDto(label: 'Input Button Line Height', type: InputTypeEnum::FLOAT, default: '$line-height-base', isLocked: true),

        // Input Button Focus Styles
        private InputDto $inputBtnFocusWidth = new InputDto(label: 'Input Button Focus Width', type: InputTypeEnum::SIZE, default: '$focus-ring-width', isLocked: true),
        private InputDto $inputBtnFocusColorOpacity = new InputDto(label: 'Input Button Focus Color Opacity', type: InputTypeEnum::FLOAT, default: '$focus-ring-opacity', isLocked: true),
        private InputDto $inputBtnFocusColor = new InputDto(label: 'Input Button Focus Color', type: InputTypeEnum::COLOR, default: '$focus-ring-color'),
        private InputDto $inputBtnFocusBlur = new InputDto(label: 'Input Button Focus Blur', type: InputTypeEnum::SIZE, default: '$focus-ring-blur'),
        private InputDto $inputBtnFocusBoxShadow = new InputDto(label: 'Input Button Focus Box Shadow', type: InputTypeEnum::STRING, default: '$focus-ring-box-shadow', isLocked: true),

        // Small Input Button Variants
        private InputDto $inputBtnPaddingYSm = new InputDto(label: 'Input Button Padding Y Small', type: InputTypeEnum::SIZE, default: '.25rem', isLocked: true),
        private InputDto $inputBtnPaddingXSm = new InputDto(label: 'Input Button Padding X Small', type: InputTypeEnum::SIZE, default: '.5rem', isLocked: true),
        private InputDto $inputBtnFontSizeSm = new InputDto(label: 'Input Button Font Size Small', type: InputTypeEnum::SIZE, default: '$font-size-sm', isLocked: true),

        // Large Input Button Variants
        private InputDto $inputBtnPaddingYLg = new InputDto(label: 'Input Button Padding Y Large', type: InputTypeEnum::SIZE, default: '.5rem', isLocked: true),
        private InputDto $inputBtnPaddingXLg = new InputDto(label: 'Input Button Padding X Large', type: InputTypeEnum::SIZE, default: '1rem', isLocked: true),
        private InputDto $inputBtnFontSizeLg = new InputDto(label: 'Input Button Font Size Large', type: InputTypeEnum::SIZE, default: '$font-size-lg', isLocked: true),

        // Input Button Border
        private InputDto $inputBtnBorderWidth = new InputDto(label: 'Input Button Border Width', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-width)', isLocked: true),
    )
    {
    }

    public function getInputBtnPaddingY(): InputDto
    {
        return $this->inputBtnPaddingY;
    }

    public function getInputBtnPaddingX(): InputDto
    {
        return $this->inputBtnPaddingX;
    }

    public function getInputBtnFontFamily(): InputDto
    {
        return $this->inputBtnFontFamily;
    }

    public function getInputBtnFontSize(): InputDto
    {
        return $this->inputBtnFontSize;
    }

    public function getInputBtnLineHeight(): InputDto
    {
        return $this->inputBtnLineHeight;
    }

    public function getInputBtnFocusWidth(): InputDto
    {
        return $this->inputBtnFocusWidth;
    }

    public function getInputBtnFocusColorOpacity(): InputDto
    {
        return $this->inputBtnFocusColorOpacity;
    }

    public function getInputBtnFocusColor(): InputDto
    {
        return $this->inputBtnFocusColor;
    }

    public function getInputBtnFocusBlur(): InputDto
    {
        return $this->inputBtnFocusBlur;
    }

    public function getInputBtnFocusBoxShadow(): InputDto
    {
        return $this->inputBtnFocusBoxShadow;
    }

    public function getInputBtnPaddingYSm(): InputDto
    {
        return $this->inputBtnPaddingYSm;
    }

    public function getInputBtnPaddingXSm(): InputDto
    {
        return $this->inputBtnPaddingXSm;
    }

    public function getInputBtnFontSizeSm(): InputDto
    {
        return $this->inputBtnFontSizeSm;
    }

    public function getInputBtnPaddingYLg(): InputDto
    {
        return $this->inputBtnPaddingYLg;
    }

    public function getInputBtnPaddingXLg(): InputDto
    {
        return $this->inputBtnPaddingXLg;
    }

    public function getInputBtnFontSizeLg(): InputDto
    {
        return $this->inputBtnFontSizeLg;
    }

    public function getInputBtnBorderWidth(): InputDto
    {
        return $this->inputBtnBorderWidth;
    }

}
