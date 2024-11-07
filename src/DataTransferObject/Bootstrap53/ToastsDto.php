<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Toasts",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class ToastsDto
{
    public function __construct(
        private InputDto $toastMaxWidth = new InputDto(label: 'Toast Max Width', type: InputTypeEnum::SIZE, default: '350px'),
        private InputDto $toastPaddingX = new InputDto(label: 'Toast Padding X', type: InputTypeEnum::SIZE, default: '.75rem'),
        private InputDto $toastPaddingY = new InputDto(label: 'Toast Padding Y', type: InputTypeEnum::SIZE, default: '.5rem'),
        private InputDto $toastFontSize = new InputDto(label: 'Toast Font Size', type: InputTypeEnum::SIZE, default: '.875rem'),
        private InputDto $toastColor = new InputDto(label: 'Toast Color', type: InputTypeEnum::COLOR, default: 'null'), // Assuming null means no color
        private InputDto $toastBackgroundColor = new InputDto(label: 'Toast Background Color', type: InputTypeEnum::COLOR, default: 'rgba(var(--#{$prefix}body-bg-rgb), .85)'),
        private InputDto $toastBorderWidth = new InputDto(label: 'Toast Border Width', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-width)'),
        private InputDto $toastBorderColor = new InputDto(label: 'Toast Border Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}border-color-translucent)'),
        private InputDto $toastBorderRadius = new InputDto(label: 'Toast Border Radius', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius)'),
        private InputDto $toastBoxShadow = new InputDto(label: 'Toast Box Shadow', type: InputTypeEnum::STRING, default: 'var(--#{$prefix}box-shadow)'), // Assuming box-shadow is a string
        private InputDto $toastSpacing = new InputDto(label: 'Toast Spacing', type: InputTypeEnum::SIZE, default: '$container-padding-x'), // Assuming $container-padding-x is a size

        private InputDto $toastHeaderColor = new InputDto(label: 'Toast Header Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-color)'),
        private InputDto $toastHeaderBackgroundColor = new InputDto(label: 'Toast Header Background Color', type: InputTypeEnum::COLOR, default: 'rgba(var(--#{$prefix}body-bg-rgb), .85)'),
        private InputDto $toastHeaderBorderColor = new InputDto(label: 'Toast Header Border Color', type: InputTypeEnum::COLOR, default: '$toast-border-color') // Assuming $toast-border-color is a color
    )
    {
    }

    public function getToastMaxWidth(): InputDto
    {
        return $this->toastMaxWidth;
    }

    public function getToastPaddingX(): InputDto
    {
        return $this->toastPaddingX;
    }

    public function getToastPaddingY(): InputDto
    {
        return $this->toastPaddingY;
    }

    public function getToastFontSize(): InputDto
    {
        return $this->toastFontSize;
    }

    public function getToastColor(): InputDto
    {
        return $this->toastColor;
    }

    public function getToastBackgroundColor(): InputDto
    {
        return $this->toastBackgroundColor;
    }

    public function getToastBorderWidth(): InputDto
    {
        return $this->toastBorderWidth;
    }

    public function getToastBorderColor(): InputDto
    {
        return $this->toastBorderColor;
    }

    public function getToastBorderRadius(): InputDto
    {
        return $this->toastBorderRadius;
    }

    public function getToastBoxShadow(): InputDto
    {
        return $this->toastBoxShadow;
    }

    public function getToastSpacing(): InputDto
    {
        return $this->toastSpacing;
    }

    public function getToastHeaderColor(): InputDto
    {
        return $this->toastHeaderColor;
    }

    public function getToastHeaderBackgroundColor(): InputDto
    {
        return $this->toastHeaderBackgroundColor;
    }

    public function getToastHeaderBorderColor(): InputDto
    {
        return $this->toastHeaderBorderColor;
    }
}
