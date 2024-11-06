<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Image Thumbnails",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class ImageThumbnailsDto
{
    public function __construct(
        private InputDto $thumbnailPadding = new InputDto(label: 'Thumbnail Padding', type: InputTypeEnum::SIZE, default: '.25rem'),
        private InputDto $thumbnailBg = new InputDto(label: 'Thumbnail Background', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-bg)'), // Assuming it's a color
        private InputDto $thumbnailBorderWidth = new InputDto(label: 'Thumbnail Border Width', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-width)'),
        private InputDto $thumbnailBorderColor = new InputDto(label: 'Thumbnail Border Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}border-color)'), // Assuming it's a color
        private InputDto $thumbnailBorderRadius = new InputDto(label: 'Thumbnail Border Radius', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius)'),
        private InputDto $thumbnailBoxShadow = new InputDto(label: 'Thumbnail Box Shadow', type: InputTypeEnum::STRING, default: 'var(--#{$prefix}box-shadow-sm)') // Assuming it's a string
    )
    {
    }

    public function getThumbnailPadding(): InputDto
    {
        return $this->thumbnailPadding;
    }

    public function getThumbnailBg(): InputDto
    {
        return $this->thumbnailBg;
    }

    public function getThumbnailBorderWidth(): InputDto
    {
        return $this->thumbnailBorderWidth;
    }

    public function getThumbnailBorderColor(): InputDto
    {
        return $this->thumbnailBorderColor;
    }

    public function getThumbnailBorderRadius(): InputDto
    {
        return $this->thumbnailBorderRadius;
    }

    public function getThumbnailBoxShadow(): InputDto
    {
        return $this->thumbnailBoxShadow;
    }
}
