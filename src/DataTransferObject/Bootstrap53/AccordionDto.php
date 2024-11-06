<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Accordion",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class AccordionDto
{
    public function __construct(
        private InputDto $accordionPaddingY = new InputDto(label: 'Accordion Padding Y', type: InputTypeEnum::SIZE, default: '1rem'),
        private InputDto $accordionPaddingX = new InputDto(label: 'Accordion Padding X', type: InputTypeEnum::SIZE, default: '1.25rem'),
        private InputDto $accordionColor = new InputDto(label: 'Accordion Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-color)'), // Assuming it's a color
        private InputDto $accordionBg = new InputDto(label: 'Accordion Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-bg)'), // Assuming it's a color
        private InputDto $accordionBorderWidth = new InputDto(label: 'Accordion Border Width', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-width)'),
        private InputDto $accordionBorderColor = new InputDto(label: 'Accordion Border Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}border-color)'), // Assuming it's a color
        private InputDto $accordionBorderRadius = new InputDto(label: 'Accordion Border Radius', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius)'),
        private InputDto $accordionInnerBorderRadius = new InputDto(label: 'Accordion Inner Border Radius', type: InputTypeEnum::SIZE, default: 'subtract($accordion-border-radius, $accordion-border-width)'),

        private InputDto $accordionBodyPaddingY = new InputDto(label: 'Accordion Body Padding Y', type: InputTypeEnum::SIZE, default: '$accordion-padding-y'),
        private InputDto $accordionBodyPaddingX = new InputDto(label: 'Accordion Body Padding X', type: InputTypeEnum::SIZE, default: '$accordion-padding-x'),

        private InputDto $accordionButtonPaddingY = new InputDto(label: 'Accordion Button Padding Y', type: InputTypeEnum::SIZE, default: '$accordion-padding-y'),
        private InputDto $accordionButtonPaddingX = new InputDto(label: 'Accordion Button Padding X', type: InputTypeEnum::SIZE, default: '$accordion-padding-x'),
        private InputDto $accordionButtonColor = new InputDto(label: 'Accordion Button Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-color)'), // Assuming it's a color
        private InputDto $accordionButtonBg = new InputDto(label: 'Accordion Button Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}accordion-bg)'), // Assuming it's a color
        private InputDto $accordionTransition = new InputDto(label: 'Accordion Transition', type: InputTypeEnum::STRING, default: '$btn-transition, border-radius .15s ease'), // Assuming it's a string
        private InputDto $accordionButtonActiveBg = new InputDto(label: 'Accordion Button Active Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}primary-bg-subtle)'), // Assuming it's a color
        private InputDto $accordionButtonActiveColor = new InputDto(label: 'Accordion Button Active Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}primary-text-emphasis)'), // Assuming it's a color

        // fusv-disable
        private InputDto $accordionButtonFocusBorderColor = new InputDto(label: 'Accordion Button Focus Border Color', type: InputTypeEnum::COLOR, default: '$input-focus-border-color'), // Assuming it's a color
        // fusv-enable
        private InputDto $accordionButtonFocusBoxShadow = new InputDto(label: 'Accordion Button Focus Box Shadow', type: InputTypeEnum::STRING, default: '$btn-focus-box-shadow'), // Assuming it's a string

        private InputDto $accordionIconWidth = new InputDto(label: 'Accordion Icon Width', type: InputTypeEnum::SIZE, default: '1.25rem'),
        private InputDto $accordionIconColor = new InputDto(label: 'Accordion Icon Color', type: InputTypeEnum::COLOR, default: '$body-color'), // Assuming it's a color
        private InputDto $accordionIconActiveColor = new InputDto(label: 'Accordion Icon Active Color', type: InputTypeEnum::COLOR, default: '$primary-text-emphasis'), // Assuming it's a color
        private InputDto $accordionIconTransition = new InputDto(label: 'Accordion Icon Transition', type: InputTypeEnum::STRING, default: 'transform .2s ease-in-out'), // Assuming it's a string
        private InputDto $accordionIconTransform = new InputDto(label: 'Accordion Icon Transform', type: InputTypeEnum::STRING, default: 'rotate(-180deg)'), // Assuming it's a string

        private InputDto $accordionButtonIcon = new InputDto(label: 'Accordion Button Icon', type: InputTypeEnum::STRING, default: 'url("data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\' fill=\'none\' stroke=\'#{$accordion-icon-color}\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><path d=\'M2 5L8 11L14 5\'/></svg>")'), // Assuming it's a string
        private InputDto $accordionButtonActiveIcon = new InputDto(label: 'Accordion Button Active Icon', type: InputTypeEnum::STRING, default: 'url("data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\' fill=\'none\' stroke=\'#{$accordion-icon-active-color}\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><path d=\'M2 5L8 11L14 5\'/></svg>")'), // Assuming it's a string
    )
    {
    }

    public function getAccordionPaddingY(): InputDto
    {
        return $this->accordionPaddingY;
    }

    public function getAccordionPaddingX(): InputDto
    {
        return $this->accordionPaddingX;
    }

    public function getAccordionColor(): InputDto
    {
        return $this->accordionColor;
    }

    public function getAccordionBg(): InputDto
    {
        return $this->accordionBg;
    }

    public function getAccordionBorderWidth(): InputDto
    {
        return $this->accordionBorderWidth;
    }

    public function getAccordionBorderColor(): InputDto
    {
        return $this->accordionBorderColor;
    }

    public function getAccordionBorderRadius(): InputDto
    {
        return $this->accordionBorderRadius;
    }

    public function getAccordionInnerBorderRadius(): InputDto
    {
        return $this->accordionInnerBorderRadius;
    }

    public function getAccordionBodyPaddingY(): InputDto
    {
        return $this->accordionBodyPaddingY;
    }

    public function getAccordionBodyPaddingX(): InputDto
    {
        return $this->accordionBodyPaddingX;
    }

    public function getAccordionButtonPaddingY(): InputDto
    {
        return $this->accordionButtonPaddingY;
    }

    public function getAccordionButtonPaddingX(): InputDto
    {
        return $this->accordionButtonPaddingX;
    }

    public function getAccordionButtonColor(): InputDto
    {
        return $this->accordionButtonColor;
    }

    public function getAccordionButtonBg(): InputDto
    {
        return $this->accordionButtonBg;
    }

    public function getAccordionTransition(): InputDto
    {
        return $this->accordionTransition;
    }

    public function getAccordionButtonActiveBg(): InputDto
    {
        return $this->accordionButtonActiveBg;
    }

    public function getAccordionButtonActiveColor(): InputDto
    {
        return $this->accordionButtonActiveColor;
    }

    public function getAccordionButtonFocusBorderColor(): InputDto
    {
        return $this->accordionButtonFocusBorderColor;
    }

    public function getAccordionButtonFocusBoxShadow(): InputDto
    {
        return $this->accordionButtonFocusBoxShadow;
    }

    public function getAccordionIconWidth(): InputDto
    {
        return $this->accordionIconWidth;
    }

    public function getAccordionIconColor(): InputDto
    {
        return $this->accordionIconColor;
    }

    public function getAccordionIconActiveColor(): InputDto
    {
        return $this->accordionIconActiveColor;
    }

    public function getAccordionIconTransition(): InputDto
    {
        return $this->accordionIconTransition;
    }

    public function getAccordionIconTransform(): InputDto
    {
        return $this->accordionIconTransform;
    }

    public function getAccordionButtonIcon(): InputDto
    {
        return $this->accordionButtonIcon;
    }

    public function getAccordionButtonActiveIcon(): InputDto
    {
        return $this->accordionButtonActiveIcon;
    }
}
