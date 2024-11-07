<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Off Canvas",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class OffCanvasDto
{
    public function __construct(
        private InputDto $offcanvasPaddingY = new InputDto(label: 'Offcanvas Padding Y', type: InputTypeEnum::SIZE, default: '$modal-inner-padding'),
        private InputDto $offcanvasPaddingX = new InputDto(label: 'Offcanvas Padding X', type: InputTypeEnum::SIZE, default: '$modal-inner-padding'),
        private InputDto $offcanvasHorizontalWidth = new InputDto(label: 'Offcanvas Horizontal Width', type: InputTypeEnum::SIZE, default: '400px'),
        private InputDto $offcanvasVerticalHeight = new InputDto(label: 'Offcanvas Vertical Height', type: InputTypeEnum::SIZE, default: '30vh'),
        private InputDto $offcanvasTransitionDuration = new InputDto(label: 'Offcanvas Transition Duration', type: InputTypeEnum::STRING, default: '.3s'),
        private InputDto $offcanvasBorderColor = new InputDto(label: 'Offcanvas Border Color', type: InputTypeEnum::COLOR, default: '$modal-content-border-color'),
        private InputDto $offcanvasBorderWidth = new InputDto(label: 'Offcanvas Border Width', type: InputTypeEnum::SIZE, default: '$modal-content-border-width'),
        private InputDto $offcanvasTitleLineHeight = new InputDto(label: 'Offcanvas Title Line Height', type: InputTypeEnum::SIZE, default: '$modal-title-line-height'),
        private InputDto $offcanvasBgColor = new InputDto(label: 'Offcanvas Bg Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-bg)'),
        private InputDto $offcanvasColor = new InputDto(label: 'Offcanvas Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-color)'),
        private InputDto $offcanvasBoxShadow = new InputDto(label: 'Offcanvas Box Shadow', type: InputTypeEnum::STRING, default: '$modal-content-box-shadow-xs'), // Not sure if this should be STRING or another type
        private InputDto $offcanvasBackdropBg = new InputDto(label: 'Offcanvas Backdrop Bg', type: InputTypeEnum::COLOR, default: '$modal-backdrop-bg'),
        private InputDto $offcanvasBackdropOpacity = new InputDto(label: 'Offcanvas Backdrop Opacity', type: InputTypeEnum::FLOAT, default: '$modal-backdrop-opacity') // Assuming opacity is a float value
    ) {}

    public function getOffcanvasPaddingY(): InputDto
    {
        return $this->offcanvasPaddingY;
    }

    public function getOffcanvasPaddingX(): InputDto
    {
        return $this->offcanvasPaddingX;
    }

    public function getOffcanvasHorizontalWidth(): InputDto
    {
        return $this->offcanvasHorizontalWidth;
    }

    public function getOffcanvasVerticalHeight(): InputDto
    {
        return $this->offcanvasVerticalHeight;
    }

    public function getOffcanvasTransitionDuration(): InputDto
    {
        return $this->offcanvasTransitionDuration;
    }

    public function getOffcanvasBorderColor(): InputDto
    {
        return $this->offcanvasBorderColor;
    }

    public function getOffcanvasBorderWidth(): InputDto
    {
        return $this->offcanvasBorderWidth;
    }

    public function getOffcanvasTitleLineHeight(): InputDto
    {
        return $this->offcanvasTitleLineHeight;
    }

    public function getOffcanvasBgColor(): InputDto
    {
        return $this->offcanvasBgColor;
    }

    public function getOffcanvasColor(): InputDto
    {
        return $this->offcanvasColor;
    }

    public function getOffcanvasBoxShadow(): InputDto
    {
        return $this->offcanvasBoxShadow;
    }

    public function getOffcanvasBackdropBg(): InputDto
    {
        return $this->offcanvasBackdropBg;
    }

    public function getOffcanvasBackdropOpacity(): InputDto
    {
        return $this->offcanvasBackdropOpacity;
    }
}
