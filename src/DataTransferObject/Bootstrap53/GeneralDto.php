<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\Attributes\ApiProperty;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;

#[OA\Schema(
    title: "Bootstrap 5.3 - General",
    type: "object",
)]
final readonly class GeneralDto
{

    public function __construct(
        #[ApiProperty(
            title: 'Border radius',
            inputType: InputTypeEnum::SIZE
        )]
        private null|string $borderRadius = "0.375rem",
        #[ApiProperty(
            title: 'Min contrast ratio',
            inputType: InputTypeEnum::FLOAT,
        )]
        private null|float  $minContrastRatio = 4.5,
        #[ApiProperty(
            title: 'Enable caret',
            inputType: InputTypeEnum::BOOLEAN,
        )]
        private null|bool   $enableCaret = true,
        #[ApiProperty(
            title: 'Enable rounded',
            inputType: InputTypeEnum::BOOLEAN,
        )]
        private null|bool   $enableRounded = true,
        #[ApiProperty(
            title: 'Enable shadows',
            inputType: InputTypeEnum::BOOLEAN,
        )]
        private null|bool   $enableShadows = false,
        #[ApiProperty(
            title: 'Enable gradients',
            inputType: InputTypeEnum::BOOLEAN,
        )]
        private null|bool   $enableGradients = false,
        #[ApiProperty(
            title: 'Enable transitions',
            inputType: InputTypeEnum::BOOLEAN,
        )]
        private null|bool   $enableTransitions = true,
        #[ApiProperty(
            title: 'Enable reduced motion',
            inputType: InputTypeEnum::BOOLEAN,
        )]
        private null|bool   $enableReducedMotion = true,
        #[ApiProperty(
            title: 'Enable smooth scroll',
            inputType: InputTypeEnum::BOOLEAN,
        )]
        private null|bool   $enableSmoothScroll = true,
        #[ApiProperty(
            title: 'Enable grid classes',
            inputType: InputTypeEnum::BOOLEAN,
        )]
        private null|bool   $enableGridClasses = true,
        #[ApiProperty(
            title: 'Enable container classes',
            inputType: InputTypeEnum::BOOLEAN,
        )]
        private null|bool   $enableContainerClasses = true,
        #[ApiProperty(
            title: 'Enable cssgrid',
            inputType: InputTypeEnum::BOOLEAN,
        )]
        private null|bool   $enableCssgrid = false,
        #[ApiProperty(
            title: 'Enable button pointers',
            inputType: InputTypeEnum::BOOLEAN,
        )]
        private null|bool   $enableButtonPointers = true,
        #[ApiProperty(
            title: 'Enable rfs',
            inputType: InputTypeEnum::BOOLEAN,
        )]
        private null|bool   $enableRfs = true,
        #[ApiProperty(
            title: 'Enable validation icons',
            inputType: InputTypeEnum::BOOLEAN,
        )]
        private null|bool   $enableValidationIcons = true,
        #[ApiProperty(
            title: 'Enable negative margins',
            inputType: InputTypeEnum::BOOLEAN,
        )]
        private null|bool   $enableNegativeMargins = false,
        #[ApiProperty(
            title: 'Enable deprecation messages',
            inputType: InputTypeEnum::BOOLEAN,
        )]
        private null|bool   $enableDeprecationMessages = true,
        #[ApiProperty(
            title: 'Enable important utilities',
            inputType: InputTypeEnum::BOOLEAN,
        )]
        private null|bool   $enableImportantUtilities = true,
        #[ApiProperty(
            title: 'Enable dark mode',
            inputType: InputTypeEnum::BOOLEAN,
        )]
        private null|bool   $enableDarkMode = true,
        #[ApiProperty(
            title: 'Color mode type',
            inputType: InputTypeEnum::STRING,
        )]
        private null|string $colorModeType = 'data',
        #[ApiProperty(
            title: 'Variable prefix',
            inputType: InputTypeEnum::STRING,
        )]
        private null|string $variablePrefix = 'bs-',
        #[ApiProperty(
            title: 'Prefix',
            inputType: InputTypeEnum::STRING,
        )]
        private null|string $prefix = '$variable-prefix',
        #[ApiProperty(
            title: 'Gradient',
            inputType: InputTypeEnum::GRADIENT,
        )]
        private null|string $gradient = 'linear-gradient(180deg, rgba($white, .15), rgba($white, 0))',
        #[ApiProperty(
            title: 'Spacer',
            inputType: InputTypeEnum::SIZE,
        )]
        private null|string $spacer = '1rem',
        #[ApiProperty(
            title: 'Body text align',
            inputType: InputTypeEnum::STRING,
        )]
        private null|string $bodyTextAlign = 'null',
        #[ApiProperty(
            title: 'Paragraph margin bottom',
            inputType: InputTypeEnum::SIZE,
        )]
        private null|string $paragraphMarginBottom = '1rem',
        #[ApiProperty(
            title: 'Container padding x',
            inputType: InputTypeEnum::SIZE,
        )]
        private null|string $containerPaddingX = '$grid-gutter-width',
        #[ApiProperty(
            title: 'Text muted',
            inputType: InputTypeEnum::COLOR,
        )]
        private null|string $textMuted = 'var(--#{$prefix}secondary-color)',
        #[ApiProperty(
            title: 'Vr border width',
            inputType: InputTypeEnum::SIZE,
        )]
        private null|string $vrBorderWidth = 'var(--#{$prefix}border-width)',
        #[ApiProperty(
            title: 'Code font size',
            inputType: InputTypeEnum::SIZE,
        )]
        private null|string $codeFontSize = '$small-font-size',
        #[ApiProperty(
            title: 'Code color',
            inputType: InputTypeEnum::COLOR,
        )]
        private null|string $codeColor = '$pink',
        #[ApiProperty(
            title: 'Kbd padding y',
            inputType: InputTypeEnum::SIZE,
        )]
        private null|string $kbdPaddingY = '.1875rem',
        #[ApiProperty(
            title: 'Kbd padding x',
            inputType: InputTypeEnum::SIZE,
        )]
        private null|string $kbdPaddingX = '.375rem',
        #[ApiProperty(
            title: 'Kbd font size',
            inputType: InputTypeEnum::SIZE,
        )]
        private null|string $kbdFontSize = '$code-font-size',
        #[ApiProperty(
            title: 'Kbd color',
            inputType: InputTypeEnum::COLOR,
        )]
        private null|string $kbdColor = 'var(--#{$prefix}body-bg)',
        #[ApiProperty(
            title: 'Kbd bg',
            inputType: InputTypeEnum::COLOR,
        )]
        private null|string $kbdBg = 'var(--#{$prefix}body-color)',
        #[ApiProperty(
            title: 'Nested kbd font weight',
            inputType: InputTypeEnum::STRING,
        )]
        private null|string $nestedKbdFontWeight = 'null',
        #[ApiProperty(
            title: 'Pre color',
            inputType: InputTypeEnum::COLOR,
        )]
        private null|string $preColor = 'null',
    )
    {
    }

    public function getBorderRadius(): ?string
    {
        return $this->borderRadius;
    }

    public function getMinContrastRatio(): ?float
    {
        return $this->minContrastRatio;
    }

    public function getEnableCaret(): ?bool
    {
        return $this->enableCaret;
    }

    public function getEnableRounded(): ?bool
    {
        return $this->enableRounded;
    }

    public function getEnableShadows(): ?bool
    {
        return $this->enableShadows;
    }

    public function getEnableGradients(): ?bool
    {
        return $this->enableGradients;
    }

    public function getEnableTransitions(): ?bool
    {
        return $this->enableTransitions;
    }

    public function getEnableReducedMotion(): ?bool
    {
        return $this->enableReducedMotion;
    }

    public function getEnableSmoothScroll(): ?bool
    {
        return $this->enableSmoothScroll;
    }

    public function getEnableGridClasses(): ?bool
    {
        return $this->enableGridClasses;
    }

    public function getEnableContainerClasses(): ?bool
    {
        return $this->enableContainerClasses;
    }

    public function getEnableCssgrid(): ?bool
    {
        return $this->enableCssgrid;
    }

    public function getEnableButtonPointers(): ?bool
    {
        return $this->enableButtonPointers;
    }

    public function getEnableRfs(): ?bool
    {
        return $this->enableRfs;
    }

    public function getEnableValidationIcons(): ?bool
    {
        return $this->enableValidationIcons;
    }

    public function getEnableNegativeMargins(): ?bool
    {
        return $this->enableNegativeMargins;
    }

    public function getEnableDeprecationMessages(): ?bool
    {
        return $this->enableDeprecationMessages;
    }

    public function getEnableImportantUtilities(): ?bool
    {
        return $this->enableImportantUtilities;
    }

    public function getEnableDarkMode(): ?bool
    {
        return $this->enableDarkMode;
    }

    public function getColorModeType(): ?string
    {
        return $this->colorModeType;
    }

    public function getVariablePrefix(): ?string
    {
        return $this->variablePrefix;
    }

    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    public function getGradient(): ?string
    {
        return $this->gradient;
    }

    public function getSpacer(): ?string
    {
        return $this->spacer;
    }

    public function getBodyTextAlign(): ?string
    {
        return $this->bodyTextAlign;
    }

    public function getParagraphMarginBottom(): ?string
    {
        return $this->paragraphMarginBottom;
    }

    public function getContainerPaddingX(): ?string
    {
        return $this->containerPaddingX;
    }

    public function getTextMuted(): ?string
    {
        return $this->textMuted;
    }

    public function getVrBorderWidth(): ?string
    {
        return $this->vrBorderWidth;
    }

    public function getCodeFontSize(): ?string
    {
        return $this->codeFontSize;
    }

    public function getCodeColor(): ?string
    {
        return $this->codeColor;
    }

    public function getKbdPaddingY(): ?string
    {
        return $this->kbdPaddingY;
    }

    public function getKbdPaddingX(): ?string
    {
        return $this->kbdPaddingX;
    }

    public function getKbdFontSize(): ?string
    {
        return $this->kbdFontSize;
    }

    public function getKbdColor(): ?string
    {
        return $this->kbdColor;
    }

    public function getKbdBg(): ?string
    {
        return $this->kbdBg;
    }

    public function getNestedKbdFontWeight(): ?string
    {
        return $this->nestedKbdFontWeight;
    }

    public function getPreColor(): ?string
    {
        return $this->preColor;
    }
}
