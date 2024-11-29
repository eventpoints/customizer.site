<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Carousel",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class CarouselDto
{
    public function __construct(
        private InputDto $carouselControlColor = new InputDto(label: 'Carousel Control Color', type: InputTypeEnum::COLOR, default: '$white'),
        private InputDto $carouselControlWidth = new InputDto(label: 'Carousel Control Width', type: InputTypeEnum::SIZE, default: '15%' , isLocked: true),
        private InputDto $carouselControlOpacity = new InputDto(label: 'Carousel Control Opacity', type: InputTypeEnum::FLOAT, default: '.5' , isLocked: true),
        private InputDto $carouselControlHoverOpacity = new InputDto(label: 'Carousel Control Hover Opacity', type: InputTypeEnum::FLOAT, default: '.9' , isLocked: true),
        private InputDto $carouselControlTransition = new InputDto(label: 'Carousel Control Transition', type: InputTypeEnum::STRING, default: 'opacity .15s ease', isLocked: true), // Not sure if this should be a specific type

        private InputDto $carouselIndicatorWidth = new InputDto(label: 'Carousel Indicator Width', type: InputTypeEnum::SIZE, default: '30px', isLocked: true),
        private InputDto $carouselIndicatorHeight = new InputDto(label: 'Carousel Indicator Height', type: InputTypeEnum::SIZE, default: '3px', isLocked: true),
        private InputDto $carouselIndicatorHitAreaHeight = new InputDto(label: 'Carousel Indicator Hit Area Height', type: InputTypeEnum::SIZE, default: '10px', isLocked: true),
        private InputDto $carouselIndicatorSpacer = new InputDto(label: 'Carousel Indicator Spacer', type: InputTypeEnum::SIZE, default: '3px', isLocked: true),
        private InputDto $carouselIndicatorOpacity = new InputDto(label: 'Carousel Indicator Opacity', type: InputTypeEnum::FLOAT, default: '.5', isLocked: true),
        private InputDto $carouselIndicatorActiveBg = new InputDto(label: 'Carousel Indicator Active Bg', type: InputTypeEnum::COLOR, default: '$white'),
        private InputDto $carouselIndicatorActiveOpacity = new InputDto(label: 'Carousel Indicator Active Opacity', type: InputTypeEnum::FLOAT, default: '1', isLocked: true),
        private InputDto $carouselIndicatorTransition = new InputDto(label: 'Carousel Indicator Transition', type: InputTypeEnum::STRING, default: 'opacity .6s ease', isLocked: true), // Not sure if this should be a specific type

        private InputDto $carouselCaptionWidth = new InputDto(label: 'Carousel Caption Width', type: InputTypeEnum::SIZE, default: '70%', isLocked: true),
        private InputDto $carouselCaptionColor = new InputDto(label: 'Carousel Caption Color', type: InputTypeEnum::COLOR, default: '$white'),
        private InputDto $carouselCaptionPaddingY = new InputDto(label: 'Carousel Caption Padding Y', type: InputTypeEnum::SIZE, default: '1.25rem', isLocked: true),
        private InputDto $carouselCaptionSpacer = new InputDto(label: 'Carousel Caption Spacer', type: InputTypeEnum::SIZE, default: '1.25rem', isLocked: true),

        private InputDto $carouselControlIconWidth = new InputDto(label: 'Carousel Control Icon Width', type: InputTypeEnum::SIZE, default: '2rem', isLocked: true),

        private InputDto $carouselControlPrevIconBg = new InputDto(label: 'Carousel Control Prev Icon Bg', type: InputTypeEnum::STRING, default: 'url("data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\' fill=\'#{$carousel-control-color}\'><path d=\'M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z\'/></svg>")', isLocked: true), // Not sure if this should be a specific type
        private InputDto $carouselControlNextIconBg = new InputDto(label: 'Carousel Control Next Icon Bg', type: InputTypeEnum::STRING, default: 'url("data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\' fill=\'#{$carousel-control-color}\'><path d=\'M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z\'/></svg>")', isLocked: true), // Not sure if this should be a specific type

        private InputDto $carouselTransitionDuration = new InputDto(label: 'Carousel Transition Duration', type: InputTypeEnum::STRING, default: '.6s', isLocked: true),
        private InputDto $carouselTransition = new InputDto(label: 'Carousel Transition', type: InputTypeEnum::STRING, default: 'transform .6s ease-in-out', isLocked: true), // Not sure if this should be a specific type

        private InputDto $carouselDarkIndicatorActiveBg = new InputDto(label: 'Carousel Dark Indicator Active Bg', type: InputTypeEnum::COLOR, default: '$black'),
        private InputDto $carouselDarkCaptionColor = new InputDto(label: 'Carousel Dark Caption Color', type: InputTypeEnum::COLOR, default: '$black'),
        private InputDto $carouselDarkControlIconFilter = new InputDto(label: 'Carousel Dark Control Icon Filter', type: InputTypeEnum::STRING, default: 'invert(1) grayscale(100)', isLocked: true) // Not sure if this should be a specific type
    )
    {
    }

    public function getCarouselControlColor(): InputDto
    {
        return $this->carouselControlColor;
    }

    public function getCarouselControlWidth(): InputDto
    {
        return $this->carouselControlWidth;
    }

    public function getCarouselControlOpacity(): InputDto
    {
        return $this->carouselControlOpacity;
    }

    public function getCarouselControlHoverOpacity(): InputDto
    {
        return $this->carouselControlHoverOpacity;
    }

    public function getCarouselControlTransition(): InputDto
    {
        return $this->carouselControlTransition;
    }

    public function getCarouselIndicatorWidth(): InputDto
    {
        return $this->carouselIndicatorWidth;
    }

    public function getCarouselIndicatorHeight(): InputDto
    {
        return $this->carouselIndicatorHeight;
    }

    public function getCarouselIndicatorHitAreaHeight(): InputDto
    {
        return $this->carouselIndicatorHitAreaHeight;
    }

    public function getCarouselIndicatorSpacer(): InputDto
    {
        return $this->carouselIndicatorSpacer;
    }

    public function getCarouselIndicatorOpacity(): InputDto
    {
        return $this->carouselIndicatorOpacity;
    }

    public function getCarouselIndicatorActiveBg(): InputDto
    {
        return $this->carouselIndicatorActiveBg;
    }

    public function getCarouselIndicatorActiveOpacity(): InputDto
    {
        return $this->carouselIndicatorActiveOpacity;
    }

    public function getCarouselIndicatorTransition(): InputDto
    {
        return $this->carouselIndicatorTransition;
    }

    public function getCarouselCaptionWidth(): InputDto
    {
        return $this->carouselCaptionWidth;
    }

    public function getCarouselCaptionColor(): InputDto
    {
        return $this->carouselCaptionColor;
    }

    public function getCarouselCaptionPaddingY(): InputDto
    {
        return $this->carouselCaptionPaddingY;
    }

    public function getCarouselCaptionSpacer(): InputDto
    {
        return $this->carouselCaptionSpacer;
    }

    public function getCarouselControlIconWidth(): InputDto
    {
        return $this->carouselControlIconWidth;
    }

    public function getCarouselControlPrevIconBg(): InputDto
    {
        return $this->carouselControlPrevIconBg;
    }

    public function getCarouselControlNextIconBg(): InputDto
    {
        return $this->carouselControlNextIconBg;
    }

    public function getCarouselTransitionDuration(): InputDto
    {
        return $this->carouselTransitionDuration;
    }

    public function getCarouselTransition(): InputDto
    {
        return $this->carouselTransition;
    }

    public function getCarouselDarkIndicatorActiveBg(): InputDto
    {
        return $this->carouselDarkIndicatorActiveBg;
    }

    public function getCarouselDarkCaptionColor(): InputDto
    {
        return $this->carouselDarkCaptionColor;
    }

    public function getCarouselDarkControlIconFilter(): InputDto
    {
        return $this->carouselDarkControlIconFilter;
    }
}
