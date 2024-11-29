<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Close",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class CloseDto
{
    public function __construct(
        private InputDto $btnCloseWidth = new InputDto(label: 'Button Close Width', type: InputTypeEnum::SIZE, default: '1em', isLocked: true),
        private InputDto $btnCloseHeight = new InputDto(label: 'Button Close Height', type: InputTypeEnum::SIZE, default: '$btn-close-width', isLocked: true), // Assuming it's a reference to another variable
        private InputDto $btnClosePaddingX = new InputDto(label: 'Button Close Padding X', type: InputTypeEnum::SIZE, default: '.25em', isLocked: true),
        private InputDto $btnClosePaddingY = new InputDto(label: 'Button Close Padding Y', type: InputTypeEnum::SIZE, default: '$btn-close-padding-x', isLocked: true), // Assuming it's a reference to another variable
        private InputDto $btnCloseColor = new InputDto(label: 'Button Close Color', type: InputTypeEnum::COLOR, default: '$black', isLocked: true), // Assuming $black is a color variable
        private InputDto $btnCloseBg = new InputDto(label: 'Button Close Background', type: InputTypeEnum::STRING, default: 'url("data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\' fill=\'#{$btn-close-color}\'><path d=\'M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z\'/></svg>")', isLocked: true),
        private InputDto $btnCloseFocusShadow = new InputDto(label: 'Button Close Focus Shadow', type: InputTypeEnum::STRING, default: '$focus-ring-box-shadow', isLocked: true), // Assuming it's a reference to another variable
        private InputDto $btnCloseOpacity = new InputDto(label: 'Button Close Opacity', type: InputTypeEnum::FLOAT, default: '.5', isLocked: true),
        private InputDto $btnCloseHoverOpacity = new InputDto(label: 'Button Close Hover Opacity', type: InputTypeEnum::FLOAT, default: '.75', isLocked: true),
        private InputDto $btnCloseFocusOpacity = new InputDto(label: 'Button Close Focus Opacity', type: InputTypeEnum::FLOAT, default: '1', isLocked: true),
        private InputDto $btnCloseDisabledOpacity = new InputDto(label: 'Button Close Disabled Opacity', type: InputTypeEnum::FLOAT, default: '.25', isLocked: true),
        private InputDto $btnCloseWhiteFilter = new InputDto(label: 'Button Close White Filter', type: InputTypeEnum::STRING, default: 'invert(1) grayscale(100%) brightness(200%)', isLocked: true) // Not sure if this should be a different type
    )
    {
    }

    public function getBtnCloseWidth(): InputDto
    {
        return $this->btnCloseWidth;
    }

    public function getBtnCloseHeight(): InputDto
    {
        return $this->btnCloseHeight;
    }

    public function getBtnClosePaddingX(): InputDto
    {
        return $this->btnClosePaddingX;
    }

    public function getBtnClosePaddingY(): InputDto
    {
        return $this->btnClosePaddingY;
    }

    public function getBtnCloseColor(): InputDto
    {
        return $this->btnCloseColor;
    }

    public function getBtnCloseBg(): InputDto
    {
        return $this->btnCloseBg;
    }

    public function getBtnCloseFocusShadow(): InputDto
    {
        return $this->btnCloseFocusShadow;
    }

    public function getBtnCloseOpacity(): InputDto
    {
        return $this->btnCloseOpacity;
    }

    public function getBtnCloseHoverOpacity(): InputDto
    {
        return $this->btnCloseHoverOpacity;
    }

    public function getBtnCloseFocusOpacity(): InputDto
    {
        return $this->btnCloseFocusOpacity;
    }

    public function getBtnCloseDisabledOpacity(): InputDto
    {
        return $this->btnCloseDisabledOpacity;
    }

    public function getBtnCloseWhiteFilter(): InputDto
    {
        return $this->btnCloseWhiteFilter;
    }
}
