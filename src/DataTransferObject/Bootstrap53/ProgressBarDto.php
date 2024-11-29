<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - ProgressBar",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class ProgressBarDto
{
    public function __construct(
        private InputDto $progressHeight = new InputDto(label: 'Progress Height', type: InputTypeEnum::SIZE, default: '1rem', isLocked: true),
        private InputDto $progressFontSize = new InputDto(label: 'Progress Font Size', type: InputTypeEnum::SIZE, default: '$font-size-base * .75', isLocked: true), // Assuming $font-size-base is a size
        private InputDto $progressBg = new InputDto(label: 'Progress Background', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-bg)', isLocked: true), // Assuming it's a color
        private InputDto $progressBorderRadius = new InputDto(label: 'Progress Border Radius', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius)', isLocked: true), // Assuming it's a size
        private InputDto $progressBoxShadow = new InputDto(label: 'Progress Box Shadow', type: InputTypeEnum::STRING, default: 'var(--#{$prefix}box-shadow-inset)', isLocked: true), // Assuming it's a string
        private InputDto $progressBarColor = new InputDto(label: 'Progress Bar Color', type: InputTypeEnum::COLOR, default: '$white'), // Assuming $white is a color
        private InputDto $progressBarBg = new InputDto(label: 'Progress Bar Background', type: InputTypeEnum::COLOR, default: '$primary'), // Assuming $primary is a color
        private InputDto $progressBarAnimationTiming = new InputDto(label: 'Progress Bar Animation Timing', type: InputTypeEnum::STRING, default: '1s linear infinite', isLocked: true), // Assuming it's a string
        private InputDto $progressBarTransition = new InputDto(label: 'Progress Bar Transition', type: InputTypeEnum::STRING, default: 'width .6s ease', isLocked: true) // Assuming it's a string
    )
    {
    }

    public function getProgressHeight(): InputDto
    {
        return $this->progressHeight;
    }

    public function getProgressFontSize(): InputDto
    {
        return $this->progressFontSize;
    }

    public function getProgressBg(): InputDto
    {
        return $this->progressBg;
    }

    public function getProgressBorderRadius(): InputDto
    {
        return $this->progressBorderRadius;
    }

    public function getProgressBoxShadow(): InputDto
    {
        return $this->progressBoxShadow;
    }

    public function getProgressBarColor(): InputDto
    {
        return $this->progressBarColor;
    }

    public function getProgressBarBg(): InputDto
    {
        return $this->progressBarBg;
    }

    public function getProgressBarAnimationTiming(): InputDto
    {
        return $this->progressBarAnimationTiming;
    }

    public function getProgressBarTransition(): InputDto
    {
        return $this->progressBarTransition;
    }
}
