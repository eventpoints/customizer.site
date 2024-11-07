<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Tooltips",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class TooltipsDto
{
    public function __construct(
        private InputDto $tooltipFontSize = new InputDto(label: 'Tooltip Font Size', type: InputTypeEnum::SIZE, default: '$font-size-sm'),
        private InputDto $tooltipMaxWidth = new InputDto(label: 'Tooltip Max Width', type: InputTypeEnum::SIZE, default: '200px'),
        private InputDto $tooltipColor = new InputDto(label: 'Tooltip Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-bg)'),
        private InputDto $tooltipBg = new InputDto(label: 'Tooltip Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}emphasis-color)'),
        private InputDto $tooltipBorderRadius = new InputDto(label: 'Tooltip Border Radius', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius)'),
        private InputDto $tooltipOpacity = new InputDto(label: 'Tooltip Opacity', type: InputTypeEnum::FLOAT, default: '.9'),
        private InputDto $tooltipPaddingY = new InputDto(label: 'Tooltip Padding Y', type: InputTypeEnum::SIZE, default: '$spacer * .25'),
        private InputDto $tooltipPaddingX = new InputDto(label: 'Tooltip Padding X', type: InputTypeEnum::SIZE, default: '$spacer * .5'),
        private InputDto $tooltipMargin = new InputDto(label: 'Tooltip Margin', type: InputTypeEnum::STRING, default: 'null'),
        private InputDto $tooltipArrowWidth = new InputDto(label: 'Tooltip Arrow Width', type: InputTypeEnum::SIZE, default: '.8rem'),
        private InputDto $tooltipArrowHeight = new InputDto(label: 'Tooltip Arrow Height', type: InputTypeEnum::SIZE, default: '.4rem'),
        private InputDto $tooltipArrowColor = new InputDto(label: 'Tooltip Arrow Color', type: InputTypeEnum::COLOR, default: 'null'), // Deprecated in Bootstrap 5.2.0 for CSS variables
        private InputDto $formFeedbackTooltipPaddingY = new InputDto(label: 'Form Feedback Tooltip Padding Y', type: InputTypeEnum::SIZE, default: '$tooltip-padding-y'),
        private InputDto $formFeedbackTooltipPaddingX = new InputDto(label: 'Form Feedback Tooltip Padding X', type: InputTypeEnum::SIZE, default: '$tooltip-padding-x'),
        private InputDto $formFeedbackTooltipFontSize = new InputDto(label: 'Form Feedback Tooltip Font Size', type: InputTypeEnum::SIZE, default: '$tooltip-font-size'),
        private InputDto $formFeedbackTooltipLineHeight = new InputDto(label: 'Form Feedback Tooltip Line Height', type: InputTypeEnum::STRING, default: 'null'), // Not sure about the type
        private InputDto $formFeedbackTooltipOpacity = new InputDto(label: 'Form Feedback Tooltip Opacity', type: InputTypeEnum::FLOAT, default: '$tooltip-opacity'),
        private InputDto $formFeedbackTooltipBorderRadius = new InputDto(label: 'Form Feedback Tooltip Border Radius', type: InputTypeEnum::SIZE, default: '$tooltip-border-radius')
    ) {}

    public function getTooltipFontSize(): InputDto
    {
        return $this->tooltipFontSize;
    }

    public function getTooltipMaxWidth(): InputDto
    {
        return $this->tooltipMaxWidth;
    }

    public function getTooltipColor(): InputDto
    {
        return $this->tooltipColor;
    }

    public function getTooltipBg(): InputDto
    {
        return $this->tooltipBg;
    }

    public function getTooltipBorderRadius(): InputDto
    {
        return $this->tooltipBorderRadius;
    }

    public function getTooltipOpacity(): InputDto
    {
        return $this->tooltipOpacity;
    }

    public function getTooltipPaddingY(): InputDto
    {
        return $this->tooltipPaddingY;
    }

    public function getTooltipPaddingX(): InputDto
    {
        return $this->tooltipPaddingX;
    }

    public function getTooltipMargin(): InputDto
    {
        return $this->tooltipMargin;
    }

    public function getTooltipArrowWidth(): InputDto
    {
        return $this->tooltipArrowWidth;
    }

    public function getTooltipArrowHeight(): InputDto
    {
        return $this->tooltipArrowHeight;
    }

    public function getTooltipArrowColor(): InputDto
    {
        return $this->tooltipArrowColor;
    }

    public function getFormFeedbackTooltipPaddingY(): InputDto
    {
        return $this->formFeedbackTooltipPaddingY;
    }

    public function getFormFeedbackTooltipPaddingX(): InputDto
    {
        return $this->formFeedbackTooltipPaddingX;
    }

    public function getFormFeedbackTooltipFontSize(): InputDto
    {
        return $this->formFeedbackTooltipFontSize;
    }

    public function getFormFeedbackTooltipLineHeight(): InputDto
    {
        return $this->formFeedbackTooltipLineHeight;
    }

    public function getFormFeedbackTooltipOpacity(): InputDto
    {
        return $this->formFeedbackTooltipOpacity;
    }

    public function getFormFeedbackTooltipBorderRadius(): InputDto
    {
        return $this->formFeedbackTooltipBorderRadius;
    }
}
