<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Navs",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class NavsDto
{
    public function __construct(
        private InputDto $navLinkPaddingY = new InputDto(label: 'Nav Link Padding Y', type: InputTypeEnum::SIZE, default: '.5rem'),
        private InputDto $navLinkPaddingX = new InputDto(label: 'Nav Link Padding X', type: InputTypeEnum::SIZE, default: '1rem'),
        private InputDto $navLinkFontSize = new InputDto(label: 'Nav Link Font Size', type: InputTypeEnum::SIZE, default: null),
        private InputDto $navLinkFontWeight = new InputDto(label: 'Nav Link Font Weight', type: InputTypeEnum::INTEGER, default: null),
        private InputDto $navLinkColor = new InputDto(label: 'Nav Link Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}link-color)'),
        private InputDto $navLinkHoverColor = new InputDto(label: 'Nav Link Hover Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}link-hover-color)'),
        private InputDto $navLinkTransition = new InputDto(label: 'Nav Link Transition', type: InputTypeEnum::STRING, default: 'color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out'),
        private InputDto $navLinkDisabledColor = new InputDto(label: 'Nav Link Disabled Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-color)'),
        private InputDto $navLinkFocusBoxShadow = new InputDto(label: 'Nav Link Focus Box Shadow', type: InputTypeEnum::STRING, default: '$focus-ring-box-shadow'),

        private InputDto $navTabsBorderColor = new InputDto(label: 'Nav Tabs Border Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}border-color)'),
        private InputDto $navTabsBorderWidth = new InputDto(label: 'Nav Tabs Border Width', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-width)'),
        private InputDto $navTabsBorderRadius = new InputDto(label: 'Nav Tabs Border Radius', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius)'),
        private InputDto $navTabsLinkHoverBorderColor = new InputDto(label: 'Nav Tabs Link Hover Border Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-bg) var(--#{$prefix}secondary-bg) $nav-tabs-border-color'),
        private InputDto $navTabsLinkActiveColor = new InputDto(label: 'Nav Tabs Link Active Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}emphasis-color)'),
        private InputDto $navTabsLinkActiveBg = new InputDto(label: 'Nav Tabs Link Active Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-bg)'),
        private InputDto $navTabsLinkActiveBorderColor = new InputDto(label: 'Nav Tabs Link Active Border Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}border-color) var(--#{$prefix}border-color) $nav-tabs-link-active-bg'),

        private InputDto $navPillsBorderRadius = new InputDto(label: 'Nav Pills Border Radius', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius)'),
        private InputDto $navPillsLinkActiveColor = new InputDto(label: 'Nav Pills Link Active Color', type: InputTypeEnum::COLOR, default: '$component-active-color'),
        private InputDto $navPillsLinkActiveBg = new InputDto(label: 'Nav Pills Link Active Bg', type: InputTypeEnum::COLOR, default: '$component-active-bg'),

        private InputDto $navUnderlineGap = new InputDto(label: 'Nav Underline Gap', type: InputTypeEnum::SIZE, default: '1rem'),
        private InputDto $navUnderlineBorderWidth = new InputDto(label: 'Nav Underline Border Width', type: InputTypeEnum::SIZE, default: '.125rem'),
        private InputDto $navUnderlineLinkActiveColor = new InputDto(label: 'Nav Underline Link Active Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}emphasis-color)'),
    )
    {
    }

    public function getNavLinkPaddingY(): InputDto
    {
        return $this->navLinkPaddingY;
    }

    public function getNavLinkPaddingX(): InputDto
    {
        return $this->navLinkPaddingX;
    }

    public function getNavLinkFontSize(): InputDto
    {
        return $this->navLinkFontSize;
    }

    public function getNavLinkFontWeight(): InputDto
    {
        return $this->navLinkFontWeight;
    }

    public function getNavLinkColor(): InputDto
    {
        return $this->navLinkColor;
    }

    public function getNavLinkHoverColor(): InputDto
    {
        return $this->navLinkHoverColor;
    }

    public function getNavLinkTransition(): InputDto
    {
        return $this->navLinkTransition;
    }

    public function getNavLinkDisabledColor(): InputDto
    {
        return $this->navLinkDisabledColor;
    }

    public function getNavLinkFocusBoxShadow(): InputDto
    {
        return $this->navLinkFocusBoxShadow;
    }

    public function getNavTabsBorderColor(): InputDto
    {
        return $this->navTabsBorderColor;
    }

    public function getNavTabsBorderWidth(): InputDto
    {
        return $this->navTabsBorderWidth;
    }

    public function getNavTabsBorderRadius(): InputDto
    {
        return $this->navTabsBorderRadius;
    }

    public function getNavTabsLinkHoverBorderColor(): InputDto
    {
        return $this->navTabsLinkHoverBorderColor;
    }

    public function getNavTabsLinkActiveColor(): InputDto
    {
        return $this->navTabsLinkActiveColor;
    }

    public function getNavTabsLinkActiveBg(): InputDto
    {
        return $this->navTabsLinkActiveBg;
    }

    public function getNavTabsLinkActiveBorderColor(): InputDto
    {
        return $this->navTabsLinkActiveBorderColor;
    }

    public function getNavPillsBorderRadius(): InputDto
    {
        return $this->navPillsBorderRadius;
    }

    public function getNavPillsLinkActiveColor(): InputDto
    {
        return $this->navPillsLinkActiveColor;
    }

    public function getNavPillsLinkActiveBg(): InputDto
    {
        return $this->navPillsLinkActiveBg;
    }

    public function getNavUnderlineGap(): InputDto
    {
        return $this->navUnderlineGap;
    }

    public function getNavUnderlineBorderWidth(): InputDto
    {
        return $this->navUnderlineBorderWidth;
    }

    public function getNavUnderlineLinkActiveColor(): InputDto
    {
        return $this->navUnderlineLinkActiveColor;
    }
}
