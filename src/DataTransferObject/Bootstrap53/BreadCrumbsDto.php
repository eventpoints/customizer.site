<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Bread Crumbs",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class BreadCrumbsDto
{
    public function __construct(
        private InputDto $breadcrumbFontSize = new InputDto(label: 'Breadcrumb Font Size', type: InputTypeEnum::SIZE, default: 'null', isLocked: true), // Assuming SIZE type for font-size
        private InputDto $breadcrumbPaddingY = new InputDto(label: 'Breadcrumb Padding Y', type: InputTypeEnum::FLOAT, default: '0', isLocked: true),
        private InputDto $breadcrumbPaddingX = new InputDto(label: 'Breadcrumb Padding X', type: InputTypeEnum::FLOAT, default: '0', isLocked: true),
        private InputDto $breadcrumbItemPaddingX = new InputDto(label: 'Breadcrumb Item Padding X', type: InputTypeEnum::FLOAT, default: '.5rem', isLocked: true),
        private InputDto $breadcrumbMarginBottom = new InputDto(label: 'Breadcrumb Margin Bottom', type: InputTypeEnum::FLOAT, default: '1rem', isLocked: true),
        private InputDto $breadcrumbBg = new InputDto(label: 'Breadcrumb Bg', type: InputTypeEnum::COLOR, default: 'null'), // Assuming COLOR type for background
        private InputDto $breadcrumbDividerColor = new InputDto(label: 'Breadcrumb Divider Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-color)'),
        private InputDto $breadcrumbActiveColor = new InputDto(label: 'Breadcrumb Active Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-color)'),
        private InputDto $breadcrumbDivider = new InputDto(label: 'Breadcrumb Divider', type: InputTypeEnum::STRING, default: 'quote("/")', isLocked: true),
        private InputDto $breadcrumbDividerFlipped = new InputDto(label: 'Breadcrumb Divider Flipped', type: InputTypeEnum::STRING, default: '$breadcrumb-divider', isLocked: true),
        private InputDto $breadcrumbBorderRadius = new InputDto(label: 'Breadcrumb Border Radius', type: InputTypeEnum::SIZE, default: 'null' , isLocked: true) // Assuming SIZE type for border-radius
    )
    {
    }

    public function getBreadcrumbFontSize(): InputDto
    {
        return $this->breadcrumbFontSize;
    }

    public function getBreadcrumbPaddingY(): InputDto
    {
        return $this->breadcrumbPaddingY;
    }

    public function getBreadcrumbPaddingX(): InputDto
    {
        return $this->breadcrumbPaddingX;
    }

    public function getBreadcrumbItemPaddingX(): InputDto
    {
        return $this->breadcrumbItemPaddingX;
    }

    public function getBreadcrumbMarginBottom(): InputDto
    {
        return $this->breadcrumbMarginBottom;
    }

    public function getBreadcrumbBg(): InputDto
    {
        return $this->breadcrumbBg;
    }

    public function getBreadcrumbDividerColor(): InputDto
    {
        return $this->breadcrumbDividerColor;
    }

    public function getBreadcrumbActiveColor(): InputDto
    {
        return $this->breadcrumbActiveColor;
    }

    public function getBreadcrumbDivider(): InputDto
    {
        return $this->breadcrumbDivider;
    }

    public function getBreadcrumbDividerFlipped(): InputDto
    {
        return $this->breadcrumbDividerFlipped;
    }

    public function getBreadcrumbBorderRadius(): InputDto
    {
        return $this->breadcrumbBorderRadius;
    }
}
