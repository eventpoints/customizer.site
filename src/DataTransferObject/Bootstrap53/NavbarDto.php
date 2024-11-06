<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Navbar",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class NavbarDto
{
    public function __construct(
        private InputDto $navbarPaddingY = new InputDto(label: 'Navbar Padding Y', type: InputTypeEnum::SIZE, default: '$spacer * .5'),
        private InputDto $navbarPaddingX = new InputDto(label: 'Navbar Padding X', type: InputTypeEnum::SIZE, default: 'null'),
        private InputDto $navbarNavLinkPaddingX = new InputDto(label: 'Navbar Nav Link Padding X', type: InputTypeEnum::SIZE, default: '.5rem'),
        private InputDto $navbarBrandFontSize = new InputDto(label: 'Navbar Brand Font Size', type: InputTypeEnum::SIZE, default: '$font-size-lg'),
        private InputDto $navLinkHeight = new InputDto(label: 'Nav Link Height', type: InputTypeEnum::SIZE, default: '$font-size-base * $line-height-base + $nav-link-padding-y * 2'),
        private InputDto $navbarBrandHeight = new InputDto(label: 'Navbar Brand Height', type: InputTypeEnum::SIZE, default: '$navbar-brand-font-size * $line-height-base'),
        private InputDto $navbarBrandPaddingY = new InputDto(label: 'Navbar Brand Padding Y', type: InputTypeEnum::SIZE, default: '($nav-link-height - $navbar-brand-height) * .5'),
        private InputDto $navbarBrandMarginEnd = new InputDto(label: 'Navbar Brand Margin End', type: InputTypeEnum::SIZE, default: '1rem'),
        private InputDto $navbarTogglerPaddingY = new InputDto(label: 'Navbar Toggler Padding Y', type: InputTypeEnum::SIZE, default: '.25rem'),
        private InputDto $navbarTogglerPaddingX = new InputDto(label: 'Navbar Toggler Padding X', type: InputTypeEnum::SIZE, default: '.75rem'),
        private InputDto $navbarTogglerFontSize = new InputDto(label: 'Navbar Toggler Font Size', type: InputTypeEnum::SIZE, default: '$font-size-lg'),
        private InputDto $navbarTogglerBorderRadius = new InputDto(label: 'Navbar Toggler Border Radius', type: InputTypeEnum::SIZE, default: '$btn-border-radius'),
        private InputDto $navbarTogglerFocusWidth = new InputDto(label: 'Navbar Toggler Focus Width', type: InputTypeEnum::SIZE, default: '$btn-focus-width'),
        private InputDto $navbarTogglerTransition = new InputDto(label: 'Navbar Toggler Transition', type: InputTypeEnum::STRING, default: 'box-shadow .15s ease-in-out'),
        private InputDto $navbarLightColor = new InputDto(label: 'Navbar Light Color', type: InputTypeEnum::COLOR, default: 'rgba(var(--#{$prefix}emphasis-color-rgb), .65)'),
        private InputDto $navbarLightHoverColor = new InputDto(label: 'Navbar Light Hover Color', type: InputTypeEnum::COLOR, default: 'rgba(var(--#{$prefix}emphasis-color-rgb), .8)'),
        private InputDto $navbarLightActiveColor = new InputDto(label: 'Navbar Light Active Color', type: InputTypeEnum::COLOR, default: 'rgba(var(--#{$prefix}emphasis-color-rgb), 1)'),
        private InputDto $navbarLightDisabledColor = new InputDto(label: 'Navbar Light Disabled Color', type: InputTypeEnum::COLOR, default: 'rgba(var(--#{$prefix}emphasis-color-rgb), .3)'),
        private InputDto $navbarLightIconColor = new InputDto(label: 'Navbar Light Icon Color', type: InputTypeEnum::COLOR, default: 'rgba($body-color, .75)'),
        private InputDto $navbarLightTogglerIconBg = new InputDto(label: 'Navbar Light Toggler Icon Bg', type: InputTypeEnum::STRING, default: 'url("data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 30 30\'><path stroke=\'#{$navbar-light-icon-color}\' stroke-linecap=\'round\' stroke-miterlimit=\'10\' stroke-width=\'2\' d=\'M4 7h22M4 15h22M4 23h22\'/></svg>")'),
        private InputDto $navbarLightTogglerBorderColor = new InputDto(label: 'Navbar Light Toggler Border Color', type: InputTypeEnum::COLOR, default: 'rgba(var(--#{$prefix}emphasis-color-rgb), .15)'),
        private InputDto $navbarLightBrandColor = new InputDto(label: 'Navbar Light Brand Color', type: InputTypeEnum::COLOR, default: '$navbar-light-active-color'),
        private InputDto $navbarLightBrandHoverColor = new InputDto(label: 'Navbar Light Brand Hover Color', type: InputTypeEnum::COLOR, default: '$navbar-light-active-color'),
        private InputDto $navbarDarkColor = new InputDto(label: 'Navbar Dark Color', type: InputTypeEnum::COLOR, default: 'rgba($white, .55)'),
        private InputDto $navbarDarkHoverColor = new InputDto(label: 'Navbar Dark Hover Color', type: InputTypeEnum::COLOR, default: 'rgba($white, .75)'),
        private InputDto $navbarDarkActiveColor = new InputDto(label: 'Navbar Dark Active Color', type: InputTypeEnum::COLOR, default: '$white'),
        private InputDto $navbarDarkDisabledColor = new InputDto(label: 'Navbar Dark Disabled Color', type: InputTypeEnum::COLOR, default: 'rgba($white, .25)'),
        private InputDto $navbarDarkIconColor = new InputDto(label: 'Navbar Dark Icon Color', type: InputTypeEnum::COLOR, default: '$navbar-dark-color'),
        private InputDto $navbarDarkTogglerIconBg = new InputDto(label: 'Navbar Dark Toggler Icon Bg', type: InputTypeEnum::STRING, default: 'url("data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 30 30\'><path stroke=\'#{$navbar-dark-icon-color}\' stroke-linecap=\'round\' stroke-miterlimit=\'10\' stroke-width=\'2\' d=\'M4 7h22M4 15h22M4 23h22\'/></svg>")'),
        private InputDto $navbarDarkTogglerBorderColor = new InputDto(label: 'Navbar Dark Toggler Border Color', type: InputTypeEnum::COLOR, default: 'rgba($white, .1)'),
        private InputDto $navbarDarkBrandColor = new InputDto(label: 'Navbar Dark Brand Color', type: InputTypeEnum::COLOR, default: '$navbar-dark-active-color'),
        private InputDto $navbarDarkBrandHoverColor = new InputDto(label: 'Navbar Dark Brand Hover Color', type: InputTypeEnum::COLOR, default: '$navbar-dark-active-color')
    )
    {
    }

    public function getNavbarPaddingY(): InputDto
    {
        return $this->navbarPaddingY;
    }

    public function getNavbarPaddingX(): InputDto
    {
        return $this->navbarPaddingX;
    }

    public function getNavbarNavLinkPaddingX(): InputDto
    {
        return $this->navbarNavLinkPaddingX;
    }

    public function getNavbarBrandFontSize(): InputDto
    {
        return $this->navbarBrandFontSize;
    }

    public function getNavLinkHeight(): InputDto
    {
        return $this->navLinkHeight;
    }

    public function getNavbarBrandHeight(): InputDto
    {
        return $this->navbarBrandHeight;
    }

    public function getNavbarBrandPaddingY(): InputDto
    {
        return $this->navbarBrandPaddingY;
    }

    public function getNavbarBrandMarginEnd(): InputDto
    {
        return $this->navbarBrandMarginEnd;
    }

    public function getNavbarTogglerPaddingY(): InputDto
    {
        return $this->navbarTogglerPaddingY;
    }

    public function getNavbarTogglerPaddingX(): InputDto
    {
        return $this->navbarTogglerPaddingX;
    }

    public function getNavbarTogglerFontSize(): InputDto
    {
        return $this->navbarTogglerFontSize;
    }

    public function getNavbarTogglerBorderRadius(): InputDto
    {
        return $this->navbarTogglerBorderRadius;
    }

    public function getNavbarTogglerFocusWidth(): InputDto
    {
        return $this->navbarTogglerFocusWidth;
    }

    public function getNavbarTogglerTransition(): InputDto
    {
        return $this->navbarTogglerTransition;
    }

    public function getNavbarLightColor(): InputDto
    {
        return $this->navbarLightColor;
    }

    public function getNavbarLightHoverColor(): InputDto
    {
        return $this->navbarLightHoverColor;
    }

    public function getNavbarLightActiveColor(): InputDto
    {
        return $this->navbarLightActiveColor;
    }

    public function getNavbarLightDisabledColor(): InputDto
    {
        return $this->navbarLightDisabledColor;
    }

    public function getNavbarLightIconColor(): InputDto
    {
        return $this->navbarLightIconColor;
    }

    public function getNavbarLightTogglerIconBg(): InputDto
    {
        return $this->navbarLightTogglerIconBg;
    }

    public function getNavbarLightTogglerBorderColor(): InputDto
    {
        return $this->navbarLightTogglerBorderColor;
    }

    public function getNavbarLightBrandColor(): InputDto
    {
        return $this->navbarLightBrandColor;
    }

    public function getNavbarLightBrandHoverColor(): InputDto
    {
        return $this->navbarLightBrandHoverColor;
    }

    public function getNavbarDarkColor(): InputDto
    {
        return $this->navbarDarkColor;
    }

    public function getNavbarDarkHoverColor(): InputDto
    {
        return $this->navbarDarkHoverColor;
    }

    public function getNavbarDarkActiveColor(): InputDto
    {
        return $this->navbarDarkActiveColor;
    }

    public function getNavbarDarkDisabledColor(): InputDto
    {
        return $this->navbarDarkDisabledColor;
    }

    public function getNavbarDarkIconColor(): InputDto
    {
        return $this->navbarDarkIconColor;
    }

    public function getNavbarDarkTogglerIconBg(): InputDto
    {
        return $this->navbarDarkTogglerIconBg;
    }

    public function getNavbarDarkTogglerBorderColor(): InputDto
    {
        return $this->navbarDarkTogglerBorderColor;
    }

    public function getNavbarDarkBrandColor(): InputDto
    {
        return $this->navbarDarkBrandColor;
    }

    public function getNavbarDarkBrandHoverColor(): InputDto
    {
        return $this->navbarDarkBrandHoverColor;
    }
}
