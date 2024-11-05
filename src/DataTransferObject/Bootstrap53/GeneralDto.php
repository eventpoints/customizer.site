<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;

#[OA\Schema(
    title: "Bootstrap 5.3 - General",
    type: "object",
)]
final readonly class GeneralDto
{

    public function __construct(
        #[OA\Property(
            description: 'Border radius',
            type: InputTypeEnum::RADIUS->value
        )]
        private null|string $borderRadius = "0.375rem",
        #[OA\Property(
            description: 'Min contrast ratio',
            type: InputTypeEnum::FLOAT->value,
        )]
        private null|float  $minContrastRatio = 4.5,
        #[OA\Property(
            description: 'Enable caret',
            type: InputTypeEnum::BOOLEAN->value,
        )]
        private null|bool   $enableCaret = true,
        #[OA\Property(
            description: 'Enable rounded',
            type: InputTypeEnum::BOOLEAN->value,
        )]
        private null|bool   $enableRounded = true,
        #[OA\Property(
            description: 'Enable shadows',
            type: InputTypeEnum::BOOLEAN->value,
        )]
        private null|bool   $enableShadows = false,
        #[OA\Property(
            description: 'Enable gradients',
            type: InputTypeEnum::BOOLEAN->value,
        )]
        private null|bool   $enableGradients = false,
        #[OA\Property(
            description: 'Enable transitions',
            type: InputTypeEnum::BOOLEAN->value,
        )]
        private null|bool   $enableTransitions = true,
        #[OA\Property(
            description: 'Enable reduced motion',
            type: InputTypeEnum::BOOLEAN->value,
        )]
        private null|bool   $enableReducedMotion = true,
        #[OA\Property(
            description: 'Enable smooth scroll',
            type: InputTypeEnum::BOOLEAN->value,
        )]
        private null|bool   $enableSmoothScroll = true,
        #[OA\Property(
            description: 'Enable grid classes',
            type: InputTypeEnum::BOOLEAN->value,
        )]
        private null|bool   $enableGridClasses = true,
        #[OA\Property(
            description: 'Enable container classes',
            type: InputTypeEnum::BOOLEAN->value,
        )]
        private null|bool   $enableContainerClasses = true,
        #[OA\Property(
            description: 'Enable cssgrid',
            type: InputTypeEnum::BOOLEAN->value,
        )]
        private null|bool   $enableCssgrid = false,
        #[OA\Property(
            description: 'Enable button pointers',
            type: InputTypeEnum::BOOLEAN->value,
        )]
        private null|bool   $enableButtonPointers = true,
        #[OA\Property(
            description: 'Enable rfs',
            type: InputTypeEnum::BOOLEAN->value,
        )]
        private null|bool   $enableRfs = true,
        #[OA\Property(
            description: 'Enable validation icons',
            type: InputTypeEnum::BOOLEAN->value,
        )]
        private null|bool   $enableValidationIcons = true,
        #[OA\Property(
            description: 'Enable negative margins',
            type: InputTypeEnum::BOOLEAN->value,
        )]
        private null|bool   $enableNegativeMargins = false,
        #[OA\Property(
            description: 'Enable deprecation messages',
            type: InputTypeEnum::BOOLEAN->value,
        )]
        private null|bool   $enableDeprecationMessages = true,
        #[OA\Property(
            description: 'Enable important utilities',
            type: InputTypeEnum::BOOLEAN->value,
        )]
        private null|bool   $enableImportantUtilities = true,
        #[OA\Property(
            description: 'Enable dark mode',
            type: InputTypeEnum::BOOLEAN->value,
        )]
        private null|bool   $enableDarkMode = true,
        #[OA\Property(
            description: 'Color mode type',
            type: InputTypeEnum::STRING->value,
        )]
        private null|string $colorModeType = 'data',
        #[OA\Property(
            description: 'Variable prefix',
            type: InputTypeEnum::STRING->value,
        )]
        private null|string $variablePrefix = 'bs-',
        #[OA\Property(
            description: 'Prefix',
            type: InputTypeEnum::STRING->value,
        )]
        private null|string $prefix = '$variable-prefix',
        #[OA\Property(
            description: 'Gradient',
            type: InputTypeEnum::GRADIENT->value,
        )]
        private null|string $gradient = 'linear-gradient(180deg, rgba($white, .15), rgba($white, 0))',
        #[OA\Property(
            description: 'Spacer',
            type: InputTypeEnum::SIZE->value,
        )]
        private null|string $spacer = '1rem',
        #[OA\Property(
            description: 'Body text align',
            type: InputTypeEnum::STRING->value,
        )]
        private null|string $bodyTextAlign = 'null',
        #[OA\Property(
            description: 'Paragraph margin bottom',
            type: InputTypeEnum::SIZE->value,
        )]
        private null|string $paragraphMarginBottom = '1rem',
        #[OA\Property(
            description: 'Container padding x',
            type: InputTypeEnum::SIZE->value,
        )]
        private null|string $containerPaddingX = '$grid-gutter-width',
        #[OA\Property(
            description: 'Text muted',
            type: InputTypeEnum::COLOR->value,
        )]
        private null|string $textMuted = 'var(--#{$prefix}secondary-color)',
        #[OA\Property(
            description: 'Vr border width',
            type: InputTypeEnum::SIZE->value,
        )]
        private null|string $vrBorderWidth = 'var(--#{$prefix}border-width)',
        #[OA\Property(
            description: 'Code font size',
            type: InputTypeEnum::SIZE->value,
        )]
        private null|string $codeFontSize = '$small-font-size',
        #[OA\Property(
            description: 'Code color',
            type: InputTypeEnum::COLOR->value,
        )]
        private null|string $codeColor = '$pink',
        #[OA\Property(
            description: 'Kbd padding y',
            type: InputTypeEnum::SIZE->value,
        )]
        private null|string $kbdPaddingY = '.1875rem',
        #[OA\Property(
            description: 'Kbd padding x',
            type: InputTypeEnum::SIZE->value,
        )]
        private null|string $kbdPaddingX = '.375rem',
        #[OA\Property(
            description: 'Kbd font size',
            type: InputTypeEnum::SIZE->value,
        )]
        private null|string $kbdFontSize = '$code-font-size',
        #[OA\Property(
            description: 'Kbd color',
            type: InputTypeEnum::COLOR->value,
        )]
        private null|string $kbdColor = 'var(--#{$prefix}body-bg)',
        #[OA\Property(
            description: 'Kbd bg',
            type: InputTypeEnum::COLOR->value,
        )]
        private null|string $kbdBg = 'var(--#{$prefix}body-color)',
        #[OA\Property(
            description: 'Nested kbd font weight',
            type: InputTypeEnum::STRING->value,
        )]
        private null|string $nestedKbdFontWeight = 'null',
        #[OA\Property(
            description: 'Pre color',
            type: InputTypeEnum::COLOR->value,
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
