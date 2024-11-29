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
final readonly class FontsDto
{
    public function __construct(
        // Font Families
        private InputDto $fontFamilySansSerif = new InputDto(label: 'Font Family Sans Serif', type: InputTypeEnum::STRING, default: 'system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"' , isLocked: true),
        private InputDto $fontFamilyMonospace = new InputDto(label: 'Font Family Monospace', type: InputTypeEnum::STRING, default: 'SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace' , isLocked: true),
        private InputDto $fontFamilyBase = new InputDto(label: 'Font Family Base', type: InputTypeEnum::STRING, default: 'var(--#{$prefix}font-sans-serif)', isLocked: true),
        private InputDto $fontFamilyCode = new InputDto(label: 'Font Family Code', type: InputTypeEnum::STRING, default: 'var(--#{$prefix}font-monospace), isLocked: true'),

        // Font Sizes
        private InputDto $fontSizeRoot = new InputDto(label: 'Font Size Root', type: InputTypeEnum::STRING, default: 'null', isLocked: true),
        private InputDto $fontSizeBase = new InputDto(label: 'Font Size Base', type: InputTypeEnum::SIZE, default: '1rem', isLocked: true),
        private InputDto $fontSizeSm = new InputDto(label: 'Font Size Small', type: InputTypeEnum::SIZE, default: '0.875rem', isLocked: true),
        private InputDto $fontSizeLg = new InputDto(label: 'Font Size Large', type: InputTypeEnum::SIZE, default: '1.25rem', isLocked: true),

        // Font Weights
        private InputDto $fontWeightLighter = new InputDto(label: 'Font Weight Lighter', type: InputTypeEnum::INTEGER, default: 'lighter', isLocked: true),
        private InputDto $fontWeightLight = new InputDto(label: 'Font Weight Light', type: InputTypeEnum::INTEGER, default: '300', isLocked: true),
        private InputDto $fontWeightNormal = new InputDto(label: 'Font Weight Normal', type: InputTypeEnum::INTEGER, default: '400', isLocked: true),
        private InputDto $fontWeightMedium = new InputDto(label: 'Font Weight Medium', type: InputTypeEnum::INTEGER, default: '500', isLocked: true),
        private InputDto $fontWeightSemibold = new InputDto(label: 'Font Weight Semi Bold', type: InputTypeEnum::INTEGER, default: '600', isLocked: true),
        private InputDto $fontWeightBold = new InputDto(label: 'Font Weight Bold', type: InputTypeEnum::INTEGER, default: '700', isLocked: true),
        private InputDto $fontWeightBolder = new InputDto(label: 'Font Weight Bolder', type: InputTypeEnum::STRING, default: 'bolder', isLocked: true),
        private InputDto $fontWeightBase = new InputDto(label: 'Font Weight Base', type: InputTypeEnum::INTEGER, default: '400', isLocked: true),

        // Line Heights
        private InputDto $lineHeightBase = new InputDto(label: 'Line Height Base', type: InputTypeEnum::FLOAT, default: '1.5', isLocked: true),
        private InputDto $lineHeightSm = new InputDto(label: 'Line Height Small', type: InputTypeEnum::FLOAT, default: '1.25', isLocked: true),
        private InputDto $lineHeightLg = new InputDto(label: 'Line Height Large', type: InputTypeEnum::FLOAT, default: '2.0', isLocked: true),

        // Headings
        private InputDto $h1FontSize = new InputDto(label: 'H1 Font Size', type: InputTypeEnum::SIZE, default: '2.5rem', isLocked: true),
        private InputDto $h2FontSize = new InputDto(label: 'H2 Font Size', type: InputTypeEnum::SIZE, default: '2rem', isLocked: true),
        private InputDto $h3FontSize = new InputDto(label: 'H3 Font Size', type: InputTypeEnum::SIZE, default: '1.75rem', isLocked: true),
        private InputDto $h4FontSize = new InputDto(label: 'H4 Font Size', type: InputTypeEnum::SIZE, default: '1.5rem', isLocked: true),
        private InputDto $h5FontSize = new InputDto(label: 'H5 Font Size', type: InputTypeEnum::SIZE, default: '1.25rem', isLocked: true),
        private InputDto $h6FontSize = new InputDto(label: 'H6 Font Size', type: InputTypeEnum::SIZE, default: '1rem', isLocked: true),
        private InputDto $headingsMarginBottom = new InputDto(label: 'Headings Margin Bottom', type: InputTypeEnum::SIZE, default: '$spacer', isLocked: true),
        private InputDto $headingsFontFamily = new InputDto(label: 'Headings Font Family', type: InputTypeEnum::STRING, default: 'null', isLocked: true),
        private InputDto $headingsFontStyle = new InputDto(label: 'Headings Font Style', type: InputTypeEnum::STRING, default: 'null', isLocked: true),
        private InputDto $headingsFontWeight = new InputDto(label: 'Headings Font Weight', type: InputTypeEnum::INTEGER, default: '500', isLocked: true),
        private InputDto $headingsLineHeight = new InputDto(label: 'Headings Line Height', type: InputTypeEnum::FLOAT, default: '1.2', isLocked: true),
        private InputDto $headingsColor = new InputDto(label: 'Headings Color', type: InputTypeEnum::COLOR, default: 'inherit', isLocked: true),

        // Display Settings
        private InputDto $displayFontFamily = new InputDto(label: 'Display Font Family', type: InputTypeEnum::STRING, default: 'null', isLocked: true),
        private InputDto $displayFontStyle = new InputDto(label: 'Display Font Style', type: InputTypeEnum::STRING, default: 'null', isLocked: true),
        private InputDto $displayFontWeight = new InputDto(label: 'Display Font Weight', type: InputTypeEnum::INTEGER, default: '300', isLocked: true),
        private InputDto $displayLineHeight = new InputDto(label: 'Display Line Height', type: InputTypeEnum::FLOAT, default: '1.2', isLocked: true),

        // Text Styles
        private InputDto $leadFontSize = new InputDto(label: 'Lead Font Size', type: InputTypeEnum::SIZE, default: '1.25rem', isLocked: true),
        private InputDto $leadFontWeight = new InputDto(label: 'Lead Font Weight', type: InputTypeEnum::INTEGER, default: '300', isLocked: true),
        private InputDto $smallFontSize = new InputDto(label: 'Small Font Size', type: InputTypeEnum::SIZE, default: '.875em', isLocked: true),
        private InputDto $subSupFontSize = new InputDto(label: 'Sub/Sup Font Size', type: InputTypeEnum::SIZE, default: '.75em', isLocked: true),
        private InputDto $textMuted = new InputDto(label: 'Text Muted', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-color)', isLocked: true),

        // Blockquote
        private InputDto $blockquoteMarginY = new InputDto(label: 'Blockquote Margin Y', type: InputTypeEnum::SIZE, default: '$spacer', isLocked: true),
        private InputDto $blockquoteFontSize = new InputDto(label: 'Blockquote Font Size', type: InputTypeEnum::SIZE, default: '1.25rem', isLocked: true),
        private InputDto $blockquoteFooterColor = new InputDto(label: 'Blockquote Footer Color', type: InputTypeEnum::COLOR, default: '$gray-600', isLocked: true),
        private InputDto $blockquoteFooterFontSize = new InputDto(label: 'Blockquote Footer Font Size', type: InputTypeEnum::SIZE, default: '.875em', isLocked: true),

        // Horizontal Rule (hr)
        private InputDto $hrMarginY = new InputDto(label: 'HR Margin Y', type: InputTypeEnum::SIZE, default: '$spacer', isLocked: true),
        private InputDto $hrColor = new InputDto(label: 'HR Color', type: InputTypeEnum::COLOR, default: 'inherit', isLocked: true),
        private InputDto $hrBgColor = new InputDto(label: 'HR Background Color', type: InputTypeEnum::COLOR, default: 'null', isLocked: true),
        private InputDto $hrHeight = new InputDto(label: 'HR Height', type: InputTypeEnum::STRING, default: 'null', isLocked: true),
        private InputDto $hrBorderColor = new InputDto(label: 'HR Border Color', type: InputTypeEnum::COLOR, default: 'null', isLocked: true),
        private InputDto $hrBorderWidth = new InputDto(label: 'HR Border Width', type: InputTypeEnum::STRING, default: 'var(--#{$prefix}border-width)', isLocked: true),
        private InputDto $hrOpacity = new InputDto(label: 'HR Opacity', type: InputTypeEnum::FLOAT, default: '.25', isLocked: true),

        // Others
        private InputDto $vrBorderWidth = new InputDto(label: 'VR Border Width', type: InputTypeEnum::STRING, default: 'var(--#{$prefix}border-width)', isLocked: true),
        private InputDto $legendMarginBottom = new InputDto(label: 'Legend Margin Bottom', type: InputTypeEnum::SIZE, default: '.5rem', isLocked: true),
        private InputDto $legendFontSize = new InputDto(label: 'Legend Font Size', type: InputTypeEnum::SIZE, default: '1.5rem', isLocked: true),
        private InputDto $legendFontWeight = new InputDto(label: 'Legend Font Weight', type: InputTypeEnum::STRING, default: 'null', isLocked: true),
        private InputDto $dtFontWeight = new InputDto(label: 'DT Font Weight', type: InputTypeEnum::INTEGER, default: '700', isLocked: true),

        // List and Mark Styles
        private InputDto $listInlinePadding = new InputDto(label: 'List Inline Padding', type: InputTypeEnum::SIZE, default: '.5rem', isLocked: true),
        private InputDto $markPadding = new InputDto(label: 'Mark Padding', type: InputTypeEnum::SIZE, default: '.1875em', isLocked: true),
        private InputDto $markColor = new InputDto(label: 'Mark Color', type: InputTypeEnum::COLOR, default: '$body-color', isLocked: true),
        private InputDto $markBg = new InputDto(label: 'Mark Background', type: InputTypeEnum::COLOR, default: '$yellow-100', isLocked: true)
    )
    {
    }

    public function getFontFamilySansSerif(): InputDto
    {
        return $this->fontFamilySansSerif;
    }

    public function getFontFamilyMonospace(): InputDto
    {
        return $this->fontFamilyMonospace;
    }

    public function getFontFamilyBase(): InputDto
    {
        return $this->fontFamilyBase;
    }

    public function getFontFamilyCode(): InputDto
    {
        return $this->fontFamilyCode;
    }

    public function getFontSizeRoot(): InputDto
    {
        return $this->fontSizeRoot;
    }

    public function getFontSizeBase(): InputDto
    {
        return $this->fontSizeBase;
    }

    public function getFontSizeSm(): InputDto
    {
        return $this->fontSizeSm;
    }

    public function getFontSizeLg(): InputDto
    {
        return $this->fontSizeLg;
    }

    public function getFontWeightLighter(): InputDto
    {
        return $this->fontWeightLighter;
    }

    public function getFontWeightLight(): InputDto
    {
        return $this->fontWeightLight;
    }

    public function getFontWeightNormal(): InputDto
    {
        return $this->fontWeightNormal;
    }

    public function getFontWeightMedium(): InputDto
    {
        return $this->fontWeightMedium;
    }

    public function getFontWeightSemibold(): InputDto
    {
        return $this->fontWeightSemibold;
    }

    public function getFontWeightBold(): InputDto
    {
        return $this->fontWeightBold;
    }

    public function getFontWeightBolder(): InputDto
    {
        return $this->fontWeightBolder;
    }

    public function getFontWeightBase(): InputDto
    {
        return $this->fontWeightBase;
    }

    public function getLineHeightBase(): InputDto
    {
        return $this->lineHeightBase;
    }

    public function getLineHeightSm(): InputDto
    {
        return $this->lineHeightSm;
    }

    public function getLineHeightLg(): InputDto
    {
        return $this->lineHeightLg;
    }

    public function getH1FontSize(): InputDto
    {
        return $this->h1FontSize;
    }

    public function getH2FontSize(): InputDto
    {
        return $this->h2FontSize;
    }

    public function getH3FontSize(): InputDto
    {
        return $this->h3FontSize;
    }

    public function getH4FontSize(): InputDto
    {
        return $this->h4FontSize;
    }

    public function getH5FontSize(): InputDto
    {
        return $this->h5FontSize;
    }

    public function getH6FontSize(): InputDto
    {
        return $this->h6FontSize;
    }

    public function getHeadingsMarginBottom(): InputDto
    {
        return $this->headingsMarginBottom;
    }

    public function getHeadingsFontFamily(): InputDto
    {
        return $this->headingsFontFamily;
    }

    public function getHeadingsFontStyle(): InputDto
    {
        return $this->headingsFontStyle;
    }

    public function getHeadingsFontWeight(): InputDto
    {
        return $this->headingsFontWeight;
    }

    public function getHeadingsLineHeight(): InputDto
    {
        return $this->headingsLineHeight;
    }

    public function getHeadingsColor(): InputDto
    {
        return $this->headingsColor;
    }

    public function getDisplayFontFamily(): InputDto
    {
        return $this->displayFontFamily;
    }

    public function getDisplayFontStyle(): InputDto
    {
        return $this->displayFontStyle;
    }

    public function getDisplayFontWeight(): InputDto
    {
        return $this->displayFontWeight;
    }

    public function getDisplayLineHeight(): InputDto
    {
        return $this->displayLineHeight;
    }

    public function getLeadFontSize(): InputDto
    {
        return $this->leadFontSize;
    }

    public function getLeadFontWeight(): InputDto
    {
        return $this->leadFontWeight;
    }

    public function getSmallFontSize(): InputDto
    {
        return $this->smallFontSize;
    }

    public function getSubSupFontSize(): InputDto
    {
        return $this->subSupFontSize;
    }

    public function getTextMuted(): InputDto
    {
        return $this->textMuted;
    }

    public function getBlockquoteMarginY(): InputDto
    {
        return $this->blockquoteMarginY;
    }

    public function getBlockquoteFontSize(): InputDto
    {
        return $this->blockquoteFontSize;
    }

    public function getBlockquoteFooterColor(): InputDto
    {
        return $this->blockquoteFooterColor;
    }

    public function getBlockquoteFooterFontSize(): InputDto
    {
        return $this->blockquoteFooterFontSize;
    }

    public function getHrMarginY(): InputDto
    {
        return $this->hrMarginY;
    }

    public function getHrColor(): InputDto
    {
        return $this->hrColor;
    }

    public function getHrBgColor(): InputDto
    {
        return $this->hrBgColor;
    }

    public function getHrHeight(): InputDto
    {
        return $this->hrHeight;
    }

    public function getHrBorderColor(): InputDto
    {
        return $this->hrBorderColor;
    }

    public function getHrBorderWidth(): InputDto
    {
        return $this->hrBorderWidth;
    }

    public function getHrOpacity(): InputDto
    {
        return $this->hrOpacity;
    }

    public function getVrBorderWidth(): InputDto
    {
        return $this->vrBorderWidth;
    }

    public function getLegendMarginBottom(): InputDto
    {
        return $this->legendMarginBottom;
    }

    public function getLegendFontSize(): InputDto
    {
        return $this->legendFontSize;
    }

    public function getLegendFontWeight(): InputDto
    {
        return $this->legendFontWeight;
    }

    public function getDtFontWeight(): InputDto
    {
        return $this->dtFontWeight;
    }

    public function getListInlinePadding(): InputDto
    {
        return $this->listInlinePadding;
    }

    public function getMarkPadding(): InputDto
    {
        return $this->markPadding;
    }

    public function getMarkColor(): InputDto
    {
        return $this->markColor;
    }

    public function getMarkBg(): InputDto
    {
        return $this->markBg;
    }


}