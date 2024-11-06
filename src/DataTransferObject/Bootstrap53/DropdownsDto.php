<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Dropdowns",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class DropdownsDto
{
    public function __construct(
        private InputDto $dropdownMinWidth = new InputDto(label: 'Dropdown Min Width', type: InputTypeEnum::SIZE, default: '10rem'),
        private InputDto $dropdownPaddingX = new InputDto(label: 'Dropdown Padding X', type: InputTypeEnum::SIZE, default: '0'),
        private InputDto $dropdownPaddingY = new InputDto(label: 'Dropdown Padding Y', type: InputTypeEnum::SIZE, default: '.5rem'),
        private InputDto $dropdownSpacer = new InputDto(label: 'Dropdown Spacer', type: InputTypeEnum::SIZE, default: '.125rem'),
        private InputDto $dropdownFontSize = new InputDto(label: 'Dropdown Font Size', type: InputTypeEnum::SIZE, default: '$font-size-base'), // Assuming $font-size-base is a size
        private InputDto $dropdownColor = new InputDto(label: 'Dropdown Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-color)'),
        private InputDto $dropdownBg = new InputDto(label: 'Dropdown Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-bg)'),
        private InputDto $dropdownBorderColor = new InputDto(label: 'Dropdown Border Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}border-color-translucent)'),
        private InputDto $dropdownBorderRadius = new InputDto(label: 'Dropdown Border Radius', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius)'),
        private InputDto $dropdownBorderWidth = new InputDto(label: 'Dropdown Border Width', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-width)'),
        private InputDto $dropdownInnerBorderRadius = new InputDto(label: 'Dropdown Inner Border Radius', type: InputTypeEnum::SIZE, default: 'calc(#{$dropdown-border-radius} - #{$dropdown-border-width})'), // Assuming it's a size
        private InputDto $dropdownDividerBg = new InputDto(label: 'Dropdown Divider Bg', type: InputTypeEnum::COLOR, default: '$dropdown-border-color'), // Assuming it's a color
        private InputDto $dropdownDividerMarginY = new InputDto(label: 'Dropdown Divider Margin Y', type: InputTypeEnum::SIZE, default: '$spacer * .5'), // Assuming $spacer is a size
        private InputDto $dropdownBoxShadow = new InputDto(label: 'Dropdown Box Shadow', type: InputTypeEnum::STRING, default: 'var(--#{$prefix}box-shadow)'),

        private InputDto $dropdownLinkColor = new InputDto(label: 'Dropdown Link Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-color)'),
        private InputDto $dropdownLinkHoverColor = new InputDto(label: 'Dropdown Link Hover Color', type: InputTypeEnum::COLOR, default: '$dropdown-link-color'), // Assuming it's a color
        private InputDto $dropdownLinkHoverBg = new InputDto(label: 'Dropdown Link Hover Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}tertiary-bg)'),

        private InputDto $dropdownLinkActiveColor = new InputDto(label: 'Dropdown Link Active Color', type: InputTypeEnum::COLOR, default: '$component-active-color'), // Assuming it's a color
        private InputDto $dropdownLinkActiveBg = new InputDto(label: 'Dropdown Link Active Bg', type: InputTypeEnum::COLOR, default: '$component-active-bg'), // Assuming it's a color

        private InputDto $dropdownLinkDisabledColor = new InputDto(label: 'Dropdown Link Disabled Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}tertiary-color)'),

        private InputDto $dropdownItemPaddingY = new InputDto(label: 'Dropdown Item Padding Y', type: InputTypeEnum::SIZE, default: '$spacer * .25'), // Assuming $spacer is a size
        private InputDto $dropdownItemPaddingX = new InputDto(label: 'Dropdown Item Padding X', type: InputTypeEnum::SIZE, default: '$spacer'), // Assuming $spacer is a size

        private InputDto $dropdownHeaderColor = new InputDto(label: 'Dropdown Header Color', type: InputTypeEnum::COLOR, default: '$gray-600'), // Assuming it's a color
        private InputDto $dropdownHeaderPaddingX = new InputDto(label: 'Dropdown Header Padding X', type: InputTypeEnum::SIZE, default: '$dropdown-item-padding-x'), // Assuming it's a size
        private InputDto $dropdownHeaderPaddingY = new InputDto(label: 'Dropdown Header Padding Y', type: InputTypeEnum::SIZE, default: '$dropdown-padding-y'), // Assuming it's a size
        private InputDto $dropdownHeaderPadding = new InputDto(label: 'Dropdown Header Padding', type: InputTypeEnum::SIZE, default: '$dropdown-header-padding-y $dropdown-header-padding-x'), // Assuming it's a size

        private InputDto $dropdownDarkColor = new InputDto(label: 'Dropdown Dark Color', type: InputTypeEnum::COLOR, default: '$gray-300'), // Assuming it's a color
        private InputDto $dropdownDarkBg = new InputDto(label: 'Dropdown Dark Bg', type: InputTypeEnum::COLOR, default: '$gray-800'), // Assuming it's a color
        private InputDto $dropdownDarkBorderColor = new InputDto(label: 'Dropdown Dark Border Color', type: InputTypeEnum::COLOR, default: '$dropdown-border-color'), // Assuming it's a color
        private InputDto $dropdownDarkDividerBg = new InputDto(label: 'Dropdown Dark Divider Bg', type: InputTypeEnum::COLOR, default: '$dropdown-divider-bg'), // Assuming it's a color
        private InputDto $dropdownDarkBoxShadow = new InputDto(label: 'Dropdown Dark Box Shadow', type: InputTypeEnum::STRING, default: 'null'),
        private InputDto $dropdownDarkLinkColor = new InputDto(label: 'Dropdown Dark Link Color', type: InputTypeEnum::COLOR, default: '$dropdown-dark-color'), // Assuming it's a color
        private InputDto $dropdownDarkLinkHoverColor = new InputDto(label: 'Dropdown Dark Link Hover Color', type: InputTypeEnum::COLOR, default: '$white'), // Assuming it's a color
        private InputDto $dropdownDarkLinkHoverBg = new InputDto(label: 'Dropdown Dark Link Hover Bg', type: InputTypeEnum::COLOR, default: 'rgba($white, .15)'), // Assuming it's a color
        private InputDto $dropdownDarkLinkActiveColor = new InputDto(label: 'Dropdown Dark Link Active Color', type: InputTypeEnum::COLOR, default: '$dropdown-link-active-color'), // Assuming it's a color
        private InputDto $dropdownDarkLinkActiveBg = new InputDto(label: 'Dropdown Dark Link Active Bg', type: InputTypeEnum::COLOR, default: '$dropdown-link-active-bg'), // Assuming it's a color
        private InputDto $dropdownDarkLinkDisabledColor = new InputDto(label: 'Dropdown Dark Link Disabled Color', type: InputTypeEnum::COLOR, default: '$gray-500'), // Assuming it's a color
        private InputDto $dropdownDarkHeaderColor = new InputDto(label: 'Dropdown Dark Header Color', type: InputTypeEnum::COLOR, default: '$gray-500'), // Assuming it's a color
    )
    {
    }

    public function getDropdownMinWidth(): InputDto
    {
        return $this->dropdownMinWidth;
    }

    public function getDropdownPaddingX(): InputDto
    {
        return $this->dropdownPaddingX;
    }

    public function getDropdownPaddingY(): InputDto
    {
        return $this->dropdownPaddingY;
    }

    public function getDropdownSpacer(): InputDto
    {
        return $this->dropdownSpacer;
    }

    public function getDropdownFontSize(): InputDto
    {
        return $this->dropdownFontSize;
    }

    public function getDropdownColor(): InputDto
    {
        return $this->dropdownColor;
    }

    public function getDropdownBg(): InputDto
    {
        return $this->dropdownBg;
    }

    public function getDropdownBorderColor(): InputDto
    {
        return $this->dropdownBorderColor;
    }

    public function getDropdownBorderRadius(): InputDto
    {
        return $this->dropdownBorderRadius;
    }

    public function getDropdownBorderWidth(): InputDto
    {
        return $this->dropdownBorderWidth;
    }

    public function getDropdownInnerBorderRadius(): InputDto
    {
        return $this->dropdownInnerBorderRadius;
    }

    public function getDropdownDividerBg(): InputDto
    {
        return $this->dropdownDividerBg;
    }

    public function getDropdownDividerMarginY(): InputDto
    {
        return $this->dropdownDividerMarginY;
    }

    public function getDropdownBoxShadow(): InputDto
    {
        return $this->dropdownBoxShadow;
    }

    public function getDropdownLinkColor(): InputDto
    {
        return $this->dropdownLinkColor;
    }

    public function getDropdownLinkHoverColor(): InputDto
    {
        return $this->dropdownLinkHoverColor;
    }

    public function getDropdownLinkHoverBg(): InputDto
    {
        return $this->dropdownLinkHoverBg;
    }

    public function getDropdownLinkActiveColor(): InputDto
    {
        return $this->dropdownLinkActiveColor;
    }

    public function getDropdownLinkActiveBg(): InputDto
    {
        return $this->dropdownLinkActiveBg;
    }

    public function getDropdownLinkDisabledColor(): InputDto
    {
        return $this->dropdownLinkDisabledColor;
    }

    public function getDropdownItemPaddingY(): InputDto
    {
        return $this->dropdownItemPaddingY;
    }

    public function getDropdownItemPaddingX(): InputDto
    {
        return $this->dropdownItemPaddingX;
    }

    public function getDropdownHeaderColor(): InputDto
    {
        return $this->dropdownHeaderColor;
    }

    public function getDropdownHeaderPaddingX(): InputDto
    {
        return $this->dropdownHeaderPaddingX;
    }

    public function getDropdownHeaderPaddingY(): InputDto
    {
        return $this->dropdownHeaderPaddingY;
    }

    public function getDropdownHeaderPadding(): InputDto
    {
        return $this->dropdownHeaderPadding;
    }

    public function getDropdownDarkColor(): InputDto
    {
        return $this->dropdownDarkColor;
    }

    public function getDropdownDarkBg(): InputDto
    {
        return $this->dropdownDarkBg;
    }

    public function getDropdownDarkBorderColor(): InputDto
    {
        return $this->dropdownDarkBorderColor;
    }

    public function getDropdownDarkDividerBg(): InputDto
    {
        return $this->dropdownDarkDividerBg;
    }

    public function getDropdownDarkBoxShadow(): InputDto
    {
        return $this->dropdownDarkBoxShadow;
    }

    public function getDropdownDarkLinkColor(): InputDto
    {
        return $this->dropdownDarkLinkColor;
    }

    public function getDropdownDarkLinkHoverColor(): InputDto
    {
        return $this->dropdownDarkLinkHoverColor;
    }

    public function getDropdownDarkLinkHoverBg(): InputDto
    {
        return $this->dropdownDarkLinkHoverBg;
    }

    public function getDropdownDarkLinkActiveColor(): InputDto
    {
        return $this->dropdownDarkLinkActiveColor;
    }

    public function getDropdownDarkLinkActiveBg(): InputDto
    {
        return $this->dropdownDarkLinkActiveBg;
    }

    public function getDropdownDarkLinkDisabledColor(): InputDto
    {
        return $this->dropdownDarkLinkDisabledColor;
    }

    public function getDropdownDarkHeaderColor(): InputDto
    {
        return $this->dropdownDarkHeaderColor;
    }
}
