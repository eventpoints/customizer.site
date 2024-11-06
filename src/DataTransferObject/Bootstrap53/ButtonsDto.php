<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Buttons",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class ButtonsDto
{
    public function __construct(
        // Button Color and Font
        private InputDto $btnColor = new InputDto(label: 'Button Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-color)'),
        private InputDto $btnPaddingY = new InputDto(label: 'Button Padding Y', type: InputTypeEnum::SIZE, default: '$input-btn-padding-y'),
        private InputDto $btnPaddingX = new InputDto(label: 'Button Padding X', type: InputTypeEnum::SIZE, default: '$input-btn-padding-x'),
        private InputDto $btnFontFamily = new InputDto(label: 'Button Font Family', type: InputTypeEnum::STRING, default: '$input-btn-font-family'),
        private InputDto $btnFontSize = new InputDto(label: 'Button Font Size', type: InputTypeEnum::SIZE, default: '$input-btn-font-size'),
        private InputDto $btnLineHeight = new InputDto(label: 'Button Line Height', type: InputTypeEnum::FLOAT, default: '$input-btn-line-height'),
        private InputDto $btnWhiteSpace = new InputDto(label: 'Button White Space', type: InputTypeEnum::STRING, default: 'null'),

        // Small Button Variants
        private InputDto $btnPaddingYSm = new InputDto(label: 'Button Padding Y Small', type: InputTypeEnum::SIZE, default: '$input-btn-padding-y-sm'),
        private InputDto $btnPaddingXSm = new InputDto(label: 'Button Padding X Small', type: InputTypeEnum::SIZE, default: '$input-btn-padding-x-sm'),
        private InputDto $btnFontSizeSm = new InputDto(label: 'Button Font Size Small', type: InputTypeEnum::SIZE, default: '$input-btn-font-size-sm'),

        // Large Button Variants
        private InputDto $btnPaddingYLg = new InputDto(label: 'Button Padding Y Large', type: InputTypeEnum::SIZE, default: '$input-btn-padding-y-lg'),
        private InputDto $btnPaddingXLg = new InputDto(label: 'Button Padding X Large', type: InputTypeEnum::SIZE, default: '$input-btn-padding-x-lg'),
        private InputDto $btnFontSizeLg = new InputDto(label: 'Button Font Size Large', type: InputTypeEnum::SIZE, default: '$input-btn-font-size-lg'),

        // Button Border and Focus Styles
        private InputDto $btnBorderWidth = new InputDto(label: 'Button Border Width', type: InputTypeEnum::SIZE, default: '$input-btn-border-width'),
        private InputDto $btnFontWeight = new InputDto(label: 'Button Font Weight', type: InputTypeEnum::INTEGER, default: '$font-weight-normal'),
        private InputDto $btnBoxShadow = new InputDto(label: 'Button Box Shadow', type: InputTypeEnum::STRING, default: 'inset 0 1px 0 rgba($white, .15), 0 1px 1px rgba($black, .075)'),
        private InputDto $btnFocusWidth = new InputDto(label: 'Button Focus Width', type: InputTypeEnum::SIZE, default: '$input-btn-focus-width'),
        private InputDto $btnFocusBoxShadow = new InputDto(label: 'Button Focus Box Shadow', type: InputTypeEnum::STRING, default: '$input-btn-focus-box-shadow'),
        private InputDto $btnDisabledOpacity = new InputDto(label: 'Button Disabled Opacity', type: InputTypeEnum::FLOAT, default: '.65'),

        // Button Active Box Shadow
        private InputDto $btnActiveBoxShadow = new InputDto(label: 'Button Active Box Shadow', type: InputTypeEnum::STRING, default: 'inset 0 3px 5px rgba($black, .125)'),

        // Button Link Colors
        private InputDto $btnLinkColor = new InputDto(label: 'Button Link Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}link-color)'),
        private InputDto $btnLinkHoverColor = new InputDto(label: 'Button Link Hover Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}link-hover-color)'),
        private InputDto $btnLinkDisabledColor = new InputDto(label: 'Button Link Disabled Color', type: InputTypeEnum::COLOR, default: '$gray-600'),
        private InputDto $btnLinkFocusShadowRgb = new InputDto(label: 'Button Link Focus Shadow RGB', type: InputTypeEnum::STRING, default: 'to-rgb(mix(color-contrast($link-color), $link-color, 15%))'),

        // Button Border Radius
        private InputDto $btnBorderRadius = new InputDto(label: 'Button Border Radius', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius)'),
        private InputDto $btnBorderRadiusSm = new InputDto(label: 'Button Border Radius Small', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius-sm)'),
        private InputDto $btnBorderRadiusLg = new InputDto(label: 'Button Border Radius Large', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius-lg)'),

        // Button Transition
        private InputDto $btnTransition = new InputDto(label: 'Button Transition', type: InputTypeEnum::STRING, default: 'color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out'),

        // Button Hover and Active Tint/Shade Amounts
        private InputDto $btnHoverBgShadeAmount = new InputDto(label: 'Button Hover Background Shade Amount', type: InputTypeEnum::SIZE, default: '15%'),
        private InputDto $btnHoverBgTintAmount = new InputDto(label: 'Button Hover Background Tint Amount', type: InputTypeEnum::SIZE, default: '15%'),
        private InputDto $btnHoverBorderShadeAmount = new InputDto(label: 'Button Hover Border Shade Amount', type: InputTypeEnum::SIZE, default: '20%'),
        private InputDto $btnHoverBorderTintAmount = new InputDto(label: 'Button Hover Border Tint Amount', type: InputTypeEnum::SIZE, default: '10%'),
        private InputDto $btnActiveBgShadeAmount = new InputDto(label: 'Button Active Background Shade Amount', type: InputTypeEnum::SIZE, default: '20%'),
        private InputDto $btnActiveBgTintAmount = new InputDto(label: 'Button Active Background Tint Amount', type: InputTypeEnum::SIZE, default: '20%'),
        private InputDto $btnActiveBorderShadeAmount = new InputDto(label: 'Button Active Border Shade Amount', type: InputTypeEnum::SIZE, default: '25%'),
        private InputDto $btnActiveBorderTintAmount = new InputDto(label: 'Button Active Border Tint Amount', type: InputTypeEnum::SIZE, default: '10%')
    )
    {
    }

    public function getBtnColor(): InputDto
    {
        return $this->btnColor;
    }

    public function getBtnPaddingY(): InputDto
    {
        return $this->btnPaddingY;
    }

    public function getBtnPaddingX(): InputDto
    {
        return $this->btnPaddingX;
    }

    public function getBtnFontFamily(): InputDto
    {
        return $this->btnFontFamily;
    }

    public function getBtnFontSize(): InputDto
    {
        return $this->btnFontSize;
    }

    public function getBtnLineHeight(): InputDto
    {
        return $this->btnLineHeight;
    }

    public function getBtnWhiteSpace(): InputDto
    {
        return $this->btnWhiteSpace;
    }

    public function getBtnPaddingYSm(): InputDto
    {
        return $this->btnPaddingYSm;
    }

    public function getBtnPaddingXSm(): InputDto
    {
        return $this->btnPaddingXSm;
    }

    public function getBtnFontSizeSm(): InputDto
    {
        return $this->btnFontSizeSm;
    }

    public function getBtnPaddingYLg(): InputDto
    {
        return $this->btnPaddingYLg;
    }

    public function getBtnPaddingXLg(): InputDto
    {
        return $this->btnPaddingXLg;
    }

    public function getBtnFontSizeLg(): InputDto
    {
        return $this->btnFontSizeLg;
    }

    public function getBtnBorderWidth(): InputDto
    {
        return $this->btnBorderWidth;
    }

    public function getBtnFontWeight(): InputDto
    {
        return $this->btnFontWeight;
    }

    public function getBtnBoxShadow(): InputDto
    {
        return $this->btnBoxShadow;
    }

    public function getBtnFocusWidth(): InputDto
    {
        return $this->btnFocusWidth;
    }

    public function getBtnFocusBoxShadow(): InputDto
    {
        return $this->btnFocusBoxShadow;
    }

    public function getBtnDisabledOpacity(): InputDto
    {
        return $this->btnDisabledOpacity;
    }

    public function getBtnActiveBoxShadow(): InputDto
    {
        return $this->btnActiveBoxShadow;
    }

    public function getBtnLinkColor(): InputDto
    {
        return $this->btnLinkColor;
    }

    public function getBtnLinkHoverColor(): InputDto
    {
        return $this->btnLinkHoverColor;
    }

    public function getBtnLinkDisabledColor(): InputDto
    {
        return $this->btnLinkDisabledColor;
    }

    public function getBtnLinkFocusShadowRgb(): InputDto
    {
        return $this->btnLinkFocusShadowRgb;
    }

    public function getBtnBorderRadius(): InputDto
    {
        return $this->btnBorderRadius;
    }

    public function getBtnBorderRadiusSm(): InputDto
    {
        return $this->btnBorderRadiusSm;
    }

    public function getBtnBorderRadiusLg(): InputDto
    {
        return $this->btnBorderRadiusLg;
    }

    public function getBtnTransition(): InputDto
    {
        return $this->btnTransition;
    }

    public function getBtnHoverBgShadeAmount(): InputDto
    {
        return $this->btnHoverBgShadeAmount;
    }

    public function getBtnHoverBgTintAmount(): InputDto
    {
        return $this->btnHoverBgTintAmount;
    }

    public function getBtnHoverBorderShadeAmount(): InputDto
    {
        return $this->btnHoverBorderShadeAmount;
    }

    public function getBtnHoverBorderTintAmount(): InputDto
    {
        return $this->btnHoverBorderTintAmount;
    }

    public function getBtnActiveBgShadeAmount(): InputDto
    {
        return $this->btnActiveBgShadeAmount;
    }

    public function getBtnActiveBgTintAmount(): InputDto
    {
        return $this->btnActiveBgTintAmount;
    }

    public function getBtnActiveBorderShadeAmount(): InputDto
    {
        return $this->btnActiveBorderShadeAmount;
    }

    public function getBtnActiveBorderTintAmount(): InputDto
    {
        return $this->btnActiveBorderTintAmount;
    }
}
