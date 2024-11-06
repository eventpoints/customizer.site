<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Popovers",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class PopoversDto
{
    public function __construct(
        private InputDto $popoverFontSize = new InputDto(label: 'Popover Font Size', type: InputTypeEnum::SIZE, default: '$font-size-sm'),
        private InputDto $popoverBg = new InputDto(label: 'Popover Background', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-bg)'),
        private InputDto $popoverMaxWidth = new InputDto(label: 'Popover Max Width', type: InputTypeEnum::SIZE, default: '276px'),
        private InputDto $popoverBorderWidth = new InputDto(label: 'Popover Border Width', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-width)'),
        private InputDto $popoverBorderColor = new InputDto(label: 'Popover Border Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}border-color-translucent)'),
        private InputDto $popoverBorderRadius = new InputDto(label: 'Popover Border Radius', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius-lg)'),
        private InputDto $popoverInnerBorderRadius = new InputDto(label: 'Popover Inner Border Radius', type: InputTypeEnum::SIZE, default: 'calc(#{$popover-border-radius} - #{$popover-border-width})'),
        private InputDto $popoverBoxShadow = new InputDto(label: 'Popover Box Shadow', type: InputTypeEnum::STRING, default: 'var(--#{$prefix}box-shadow)'),

        private InputDto $popoverHeaderFontSize = new InputDto(label: 'Popover Header Font Size', type: InputTypeEnum::SIZE, default: '$font-size-base'),
        private InputDto $popoverHeaderBg = new InputDto(label: 'Popover Header Background', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-bg)'),
        private InputDto $popoverHeaderColor = new InputDto(label: 'Popover Header Color', type: InputTypeEnum::COLOR, default: '$headings-color'),
        private InputDto $popoverHeaderPaddingY = new InputDto(label: 'Popover Header Padding Y', type: InputTypeEnum::SIZE, default: '.5rem'),
        private InputDto $popoverHeaderPaddingX = new InputDto(label: 'Popover Header Padding X', type: InputTypeEnum::SIZE, default: '$spacer'),

        private InputDto $popoverBodyColor = new InputDto(label: 'Popover Body Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-color)'),
        private InputDto $popoverBodyPaddingY = new InputDto(label: 'Popover Body Padding Y', type: InputTypeEnum::SIZE, default: '$spacer'),
        private InputDto $popoverBodyPaddingX = new InputDto(label: 'Popover Body Padding X', type: InputTypeEnum::SIZE, default: '$spacer'),

        private InputDto $popoverArrowWidth = new InputDto(label: 'Popover Arrow Width', type: InputTypeEnum::SIZE, default: '1rem'),
        private InputDto $popoverArrowHeight = new InputDto(label: 'Popover Arrow Height', type: InputTypeEnum::SIZE, default: '.5rem'),

        private InputDto $popoverArrowColor = new InputDto(label: 'Popover Arrow Color', type: InputTypeEnum::COLOR, default: '$popover-bg'),
        private InputDto $popoverArrowOuterColor = new InputDto(label: 'Popover Arrow Outer Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}border-color-translucent)'),
    )
    {
    }

    public function getPopoverFontSize(): InputDto
    {
        return $this->popoverFontSize;
    }

    public function getPopoverBg(): InputDto
    {
        return $this->popoverBg;
    }

    public function getPopoverMaxWidth(): InputDto
    {
        return $this->popoverMaxWidth;
    }

    public function getPopoverBorderWidth(): InputDto
    {
        return $this->popoverBorderWidth;
    }

    public function getPopoverBorderColor(): InputDto
    {
        return $this->popoverBorderColor;
    }

    public function getPopoverBorderRadius(): InputDto
    {
        return $this->popoverBorderRadius;
    }

    public function getPopoverInnerBorderRadius(): InputDto
    {
        return $this->popoverInnerBorderRadius;
    }

    public function getPopoverBoxShadow(): InputDto
    {
        return $this->popoverBoxShadow;
    }

    public function getPopoverHeaderFontSize(): InputDto
    {
        return $this->popoverHeaderFontSize;
    }

    public function getPopoverHeaderBg(): InputDto
    {
        return $this->popoverHeaderBg;
    }

    public function getPopoverHeaderColor(): InputDto
    {
        return $this->popoverHeaderColor;
    }

    public function getPopoverHeaderPaddingY(): InputDto
    {
        return $this->popoverHeaderPaddingY;
    }

    public function getPopoverHeaderPaddingX(): InputDto
    {
        return $this->popoverHeaderPaddingX;
    }

    public function getPopoverBodyColor(): InputDto
    {
        return $this->popoverBodyColor;
    }

    public function getPopoverBodyPaddingY(): InputDto
    {
        return $this->popoverBodyPaddingY;
    }

    public function getPopoverBodyPaddingX(): InputDto
    {
        return $this->popoverBodyPaddingX;
    }

    public function getPopoverArrowWidth(): InputDto
    {
        return $this->popoverArrowWidth;
    }

    public function getPopoverArrowHeight(): InputDto
    {
        return $this->popoverArrowHeight;
    }

    public function getPopoverArrowColor(): InputDto
    {
        return $this->popoverArrowColor;
    }

    public function getPopoverArrowOuterColor(): InputDto
    {
        return $this->popoverArrowOuterColor;
    }
}
