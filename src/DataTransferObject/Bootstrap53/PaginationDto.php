<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Pagination",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class PaginationDto
{
    public function __construct(
        private InputDto $paginationPaddingY = new InputDto(label: 'Pagination Padding Y', type: InputTypeEnum::SIZE, default: '.375rem'),
        private InputDto $paginationPaddingX = new InputDto(label: 'Pagination Padding X', type: InputTypeEnum::SIZE, default: '.75rem'),
        private InputDto $paginationPaddingYSm = new InputDto(label: 'Pagination Padding Y Sm', type: InputTypeEnum::SIZE, default: '.25rem'),
        private InputDto $paginationPaddingXSm = new InputDto(label: 'Pagination Padding X Sm', type: InputTypeEnum::SIZE, default: '.5rem'),
        private InputDto $paginationPaddingYLg = new InputDto(label: 'Pagination Padding Y Lg', type: InputTypeEnum::SIZE, default: '.75rem'),
        private InputDto $paginationPaddingXLg = new InputDto(label: 'Pagination Padding X Lg', type: InputTypeEnum::SIZE, default: '1.5rem'),

        private InputDto $paginationFontSize = new InputDto(label: 'Pagination Font Size', type: InputTypeEnum::SIZE, default: '$font-size-base'), // Assuming $font-size-base is a size

        private InputDto $paginationColor = new InputDto(label: 'Pagination Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}link-color)'),
        private InputDto $paginationBg = new InputDto(label: 'Pagination Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-bg)'),
        private InputDto $paginationBorderRadius = new InputDto(label: 'Pagination Border Radius', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius)'),
        private InputDto $paginationBorderWidth = new InputDto(label: 'Pagination Border Width', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-width)'),
        private InputDto $paginationMarginStart = new InputDto(label: 'Pagination Margin Start', type: InputTypeEnum::SIZE, default: 'calc(#{$pagination-border-width} * -1)'), // Assuming it's a size
        private InputDto $paginationBorderColor = new InputDto(label: 'Pagination Border Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}border-color)'),

        private InputDto $paginationFocusColor = new InputDto(label: 'Pagination Focus Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}link-hover-color)'),
        private InputDto $paginationFocusBg = new InputDto(label: 'Pagination Focus Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-bg)'),
        private InputDto $paginationFocusBoxShadow = new InputDto(label: 'Pagination Focus Box Shadow', type: InputTypeEnum::STRING, default: '$focus-ring-box-shadow'), // Assuming it's a string
        private InputDto $paginationFocusOutline = new InputDto(label: 'Pagination Focus Outline', type: InputTypeEnum::INTEGER, default: '0'), // Assuming it's an integer

        private InputDto $paginationHoverColor = new InputDto(label: 'Pagination Hover Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}link-hover-color)'),
        private InputDto $paginationHoverBg = new InputDto(label: 'Pagination Hover Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}tertiary-bg)'),
        private InputDto $paginationHoverBorderColor = new InputDto(label: 'Pagination Hover Border Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}border-color)'), // Assuming it's a color

        private InputDto $paginationActiveColor = new InputDto(label: 'Pagination Active Color', type: InputTypeEnum::COLOR, default: '$component-active-color'), // Assuming it's a color
        private InputDto $paginationActiveBg = new InputDto(label: 'Pagination Active Bg', type: InputTypeEnum::COLOR, default: '$component-active-bg'), // Assuming it's a color
        private InputDto $paginationActiveBorderColor = new InputDto(label: 'Pagination Active Border Color', type: InputTypeEnum::COLOR, default: '$component-active-bg'), // Assuming it's a color

        private InputDto $paginationDisabledColor = new InputDto(label: 'Pagination Disabled Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-color)'),
        private InputDto $paginationDisabledBg = new InputDto(label: 'Pagination Disabled Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-bg)'),
        private InputDto $paginationDisabledBorderColor = new InputDto(label: 'Pagination Disabled Border Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}border-color)'),

        private InputDto $paginationTransition = new InputDto(label: 'Pagination Transition', type: InputTypeEnum::STRING, default: 'color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out'), // Assuming it's a string

        private InputDto $paginationBorderRadiusSm = new InputDto(label: 'Pagination Border Radius Sm', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius-sm)'),
        private InputDto $paginationBorderRadiusLg = new InputDto(label: 'Pagination Border Radius Lg', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius-lg)'),
    )
    {
    }

    public function getPaginationPaddingY(): InputDto
    {
        return $this->paginationPaddingY;
    }

    public function getPaginationPaddingX(): InputDto
    {
        return $this->paginationPaddingX;
    }

    public function getPaginationPaddingYSm(): InputDto
    {
        return $this->paginationPaddingYSm;
    }

    public function getPaginationPaddingXSm(): InputDto
    {
        return $this->paginationPaddingXSm;
    }

    public function getPaginationPaddingYLg(): InputDto
    {
        return $this->paginationPaddingYLg;
    }

    public function getPaginationPaddingXLg(): InputDto
    {
        return $this->paginationPaddingXLg;
    }

    public function getPaginationFontSize(): InputDto
    {
        return $this->paginationFontSize;
    }

    public function getPaginationColor(): InputDto
    {
        return $this->paginationColor;
    }

    public function getPaginationBg(): InputDto
    {
        return $this->paginationBg;
    }

    public function getPaginationBorderRadius(): InputDto
    {
        return $this->paginationBorderRadius;
    }

    public function getPaginationBorderWidth(): InputDto
    {
        return $this->paginationBorderWidth;
    }

    public function getPaginationMarginStart(): InputDto
    {
        return $this->paginationMarginStart;
    }

    public function getPaginationBorderColor(): InputDto
    {
        return $this->paginationBorderColor;
    }

    public function getPaginationFocusColor(): InputDto
    {
        return $this->paginationFocusColor;
    }

    public function getPaginationFocusBg(): InputDto
    {
        return $this->paginationFocusBg;
    }

    public function getPaginationFocusBoxShadow(): InputDto
    {
        return $this->paginationFocusBoxShadow;
    }

    public function getPaginationFocusOutline(): InputDto
    {
        return $this->paginationFocusOutline;
    }

    public function getPaginationHoverColor(): InputDto
    {
        return $this->paginationHoverColor;
    }

    public function getPaginationHoverBg(): InputDto
    {
        return $this->paginationHoverBg;
    }

    public function getPaginationHoverBorderColor(): InputDto
    {
        return $this->paginationHoverBorderColor;
    }

    public function getPaginationActiveColor(): InputDto
    {
        return $this->paginationActiveColor;
    }

    public function getPaginationActiveBg(): InputDto
    {
        return $this->paginationActiveBg;
    }

    public function getPaginationActiveBorderColor(): InputDto
    {
        return $this->paginationActiveBorderColor;
    }

    public function getPaginationDisabledColor(): InputDto
    {
        return $this->paginationDisabledColor;
    }

    public function getPaginationDisabledBg(): InputDto
    {
        return $this->paginationDisabledBg;
    }

    public function getPaginationDisabledBorderColor(): InputDto
    {
        return $this->paginationDisabledBorderColor;
    }

    public function getPaginationTransition(): InputDto
    {
        return $this->paginationTransition;
    }

    public function getPaginationBorderRadiusSm(): InputDto
    {
        return $this->paginationBorderRadiusSm;
    }

    public function getPaginationBorderRadiusLg(): InputDto
    {
        return $this->paginationBorderRadiusLg;
    }
}
