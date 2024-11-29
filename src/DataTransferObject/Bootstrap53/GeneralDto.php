<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - General",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class GeneralDto
{

    public function __construct(
        private InputDto $borderRadius = new InputDto(label: 'Border radius', default: "0.375rem", type: InputTypeEnum::SIZE),
        private InputDto $minContrastRatio = new InputDto(label: 'Min contrast ratio', default: 4.5, type: InputTypeEnum::FLOAT, isLocked: true),
        private InputDto $enableCaret = new InputDto(label: 'Enable caret', default: true, type: InputTypeEnum::BOOLEAN, isLocked: true),
        private InputDto $enableRounded = new InputDto(label: 'Enable rounded', default: true, type: InputTypeEnum::BOOLEAN, isLocked: true),
        private InputDto $enableShadows = new InputDto(label: 'Enable shadows', default: false, type: InputTypeEnum::BOOLEAN, isLocked: true),
        private InputDto $enableGradients = new InputDto(label: 'Enable gradients', default: false, type: InputTypeEnum::BOOLEAN, isLocked: true),
        private InputDto $enableTransitions = new InputDto(label: 'Enable transitions', default: true, type: InputTypeEnum::BOOLEAN, isLocked: true),
        private InputDto $enableReducedMotion = new InputDto(label: 'Enable reduced motion', default: true, type: InputTypeEnum::BOOLEAN, isLocked: true),
        private InputDto $enableSmoothScroll = new InputDto(label: 'Enable smooth scroll', default: true, type: InputTypeEnum::BOOLEAN, isLocked: true),
        private InputDto $enableGridClasses = new InputDto(label: 'Enable grid classes', default: true, type: InputTypeEnum::BOOLEAN, isLocked: true),
        private InputDto $enableContainerClasses = new InputDto(label: 'Enable container classes', default: true, type: InputTypeEnum::BOOLEAN, isLocked: true),
        private InputDto $enableCssgrid = new InputDto(label: 'Enable cssgrid', default: false, type: InputTypeEnum::BOOLEAN, isLocked: true),
        private InputDto $enableButtonPointers = new InputDto(label: 'Enable button pointers', default: true, type: InputTypeEnum::BOOLEAN, isLocked: true),
        private InputDto $enableRfs = new InputDto(label: 'Enable rfs', default: true, type: InputTypeEnum::BOOLEAN, isLocked: true),
        private InputDto $enableValidationIcons = new InputDto(label: 'Enable validation icons', default: true, type: InputTypeEnum::BOOLEAN, isLocked: true),
        private InputDto $enableNegativeMargins = new InputDto(label: 'Enable negative margins', default: false, type: InputTypeEnum::BOOLEAN, isLocked: true),
        private InputDto $enableDeprecationMessages = new InputDto(label: 'Enable deprecation messages', default: true, type: InputTypeEnum::BOOLEAN, isLocked: true),
        private InputDto $enableImportantUtilities = new InputDto(label: 'Enable important utilities', default: true, type: InputTypeEnum::BOOLEAN, isLocked: true),
        private InputDto $enableDarkMode = new InputDto(label: 'Enable dark mode', default: true, type: InputTypeEnum::BOOLEAN, isLocked: true),
        private InputDto $colorModeType = new InputDto(label: 'Color mode type', default: 'data', type: InputTypeEnum::STRING, isLocked: true),
        private InputDto $variablePrefix = new InputDto(label: 'Variable prefix', default: 'bs-', type: InputTypeEnum::STRING, isLocked: true),
        private InputDto $prefix = new InputDto(label: 'Prefix', default: '$variable-prefix', type: InputTypeEnum::STRING, isLocked: true),
        private InputDto $gradient = new InputDto(label: 'Gradient', default: 'linear-gradient(180deg, rgba($white, .15), rgba($white, 0))', type: InputTypeEnum::GRADIENT, isLocked: true),
        private InputDto $spacer = new InputDto(label: 'Spacer', default: '1rem', type: InputTypeEnum::SIZE, isLocked: true),
        private InputDto $bodyTextAlign = new InputDto(label: 'Body text align', default: 'null', type: InputTypeEnum::STRING, isLocked: true),
        private InputDto $paragraphMarginBottom = new InputDto(label: 'Paragraph margin bottom', default: '1rem', type: InputTypeEnum::SIZE, isLocked: true),
        private InputDto $containerPaddingX = new InputDto(label: 'Container padding x', default: '$grid-gutter-width', type: InputTypeEnum::SIZE, isLocked: true),
        private InputDto $textMuted = new InputDto(label: 'Text muted', default: 'var(--#{$prefix}secondary-color)', type: InputTypeEnum::COLOR, isLocked: true),
        private InputDto $vrBorderWidth = new InputDto(label: 'Vr border width', default: 'var(--#{$prefix}border-width)', type: InputTypeEnum::SIZE, isLocked: true),
        private InputDto $codeFontSize = new InputDto(label: 'Code font size', default: '$small-font-size', type: InputTypeEnum::SIZE, isLocked: true),
        private InputDto $codeColor = new InputDto(label: 'Code color', default: '$pink', type: InputTypeEnum::COLOR, isLocked: true),
        private InputDto $kbdPaddingY = new InputDto(label: 'Kbd padding y', default: '.1875rem', type: InputTypeEnum::SIZE, isLocked: true),
        private InputDto $kbdPaddingX = new InputDto(label: 'Kbd padding x', default: '.375rem', type: InputTypeEnum::SIZE, isLocked: true),
        private InputDto $kbdFontSize = new InputDto(label: 'Kbd font size', default: '$code-font-size', type: InputTypeEnum::SIZE, isLocked: true),
        private InputDto $kbdColor = new InputDto(label: 'Kbd color', default: 'var(--#{$prefix}body-bg)', type: InputTypeEnum::COLOR, isLocked: true),
        private InputDto $kbdBg = new InputDto(label: 'Kbd bg', default: 'var(--#{$prefix}body-color)', type: InputTypeEnum::COLOR, isLocked: true),
        private InputDto $nestedKbdFontWeight = new InputDto(label: 'Nested kbd font weight', default: 'null', type: InputTypeEnum::STRING, isLocked: true),
        private InputDto $preColor = new InputDto(label: 'Pre color', default: 'null', type: InputTypeEnum::COLOR),
    )
    {
    }

    public function getBorderRadius(): InputDto
    {
        return $this->borderRadius;
    }

    public function getMinContrastRatio(): InputDto
    {
        return $this->minContrastRatio;
    }

    public function getEnableCaret(): InputDto
    {
        return $this->enableCaret;
    }

    public function getEnableRounded(): InputDto
    {
        return $this->enableRounded;
    }

    public function getEnableShadows(): InputDto
    {
        return $this->enableShadows;
    }

    public function getEnableGradients(): InputDto
    {
        return $this->enableGradients;
    }

    public function getEnableTransitions(): InputDto
    {
        return $this->enableTransitions;
    }

    public function getEnableReducedMotion(): InputDto
    {
        return $this->enableReducedMotion;
    }

    public function getEnableSmoothScroll(): InputDto
    {
        return $this->enableSmoothScroll;
    }

    public function getEnableGridClasses(): InputDto
    {
        return $this->enableGridClasses;
    }

    public function getEnableContainerClasses(): InputDto
    {
        return $this->enableContainerClasses;
    }

    public function getEnableCssgrid(): InputDto
    {
        return $this->enableCssgrid;
    }

    public function getEnableButtonPointers(): InputDto
    {
        return $this->enableButtonPointers;
    }

    public function getEnableRfs(): InputDto
    {
        return $this->enableRfs;
    }

    public function getEnableValidationIcons(): InputDto
    {
        return $this->enableValidationIcons;
    }

    public function getEnableNegativeMargins(): InputDto
    {
        return $this->enableNegativeMargins;
    }

    public function getEnableDeprecationMessages(): InputDto
    {
        return $this->enableDeprecationMessages;
    }

    public function getEnableImportantUtilities(): InputDto
    {
        return $this->enableImportantUtilities;
    }

    public function getEnableDarkMode(): InputDto
    {
        return $this->enableDarkMode;
    }

    public function getColorModeType(): InputDto
    {
        return $this->colorModeType;
    }

    public function getVariablePrefix(): InputDto
    {
        return $this->variablePrefix;
    }

    public function getPrefix(): InputDto
    {
        return $this->prefix;
    }

    public function getGradient(): InputDto
    {
        return $this->gradient;
    }

    public function getSpacer(): InputDto
    {
        return $this->spacer;
    }

    public function getBodyTextAlign(): InputDto
    {
        return $this->bodyTextAlign;
    }

    public function getParagraphMarginBottom(): InputDto
    {
        return $this->paragraphMarginBottom;
    }

    public function getContainerPaddingX(): InputDto
    {
        return $this->containerPaddingX;
    }

    public function getTextMuted(): InputDto
    {
        return $this->textMuted;
    }

    public function getVrBorderWidth(): InputDto
    {
        return $this->vrBorderWidth;
    }

    public function getCodeFontSize(): InputDto
    {
        return $this->codeFontSize;
    }

    public function getCodeColor(): InputDto
    {
        return $this->codeColor;
    }

    public function getKbdPaddingY(): InputDto
    {
        return $this->kbdPaddingY;
    }

    public function getKbdPaddingX(): InputDto
    {
        return $this->kbdPaddingX;
    }

    public function getKbdFontSize(): InputDto
    {
        return $this->kbdFontSize;
    }

    public function getKbdColor(): InputDto
    {
        return $this->kbdColor;
    }

    public function getKbdBg(): InputDto
    {
        return $this->kbdBg;
    }

    public function getNestedKbdFontWeight(): InputDto
    {
        return $this->nestedKbdFontWeight;
    }

    public function getPreColor(): InputDto
    {
        return $this->preColor;
    }
}
