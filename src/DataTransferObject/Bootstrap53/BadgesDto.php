<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Badges",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class BadgesDto
{
    public function __construct(
        private InputDto $badgeFontSize = new InputDto(label: 'Badge Font Size', type: InputTypeEnum::SIZE, default: '.75em'),
        private InputDto $badgeFontWeight = new InputDto(label: 'Badge Font Weight', type: InputTypeEnum::INTEGER, default: '$font-weight-bold'), // Assuming $font-weight-bold is a string
        private InputDto $badgeColor = new InputDto(label: 'Badge Color', type: InputTypeEnum::COLOR, default: '$white'), // Assuming $white is a color
        private InputDto $badgePaddingY = new InputDto(label: 'Badge Padding Y', type: InputTypeEnum::SIZE, default: '.35em'),
        private InputDto $badgePaddingX = new InputDto(label: 'Badge Padding X', type: InputTypeEnum::SIZE, default: '.65em'),
        private InputDto $badgeBorderRadius = new InputDto(label: 'Badge Border Radius', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius)')
    )
    {
    }

    public function getBadgeFontSize(): InputDto
    {
        return $this->badgeFontSize;
    }

    public function getBadgeFontWeight(): InputDto
    {
        return $this->badgeFontWeight;
    }

    public function getBadgeColor(): InputDto
    {
        return $this->badgeColor;
    }

    public function getBadgePaddingY(): InputDto
    {
        return $this->badgePaddingY;
    }

    public function getBadgePaddingX(): InputDto
    {
        return $this->badgePaddingX;
    }

    public function getBadgeBorderRadius(): InputDto
    {
        return $this->badgeBorderRadius;
    }
}
