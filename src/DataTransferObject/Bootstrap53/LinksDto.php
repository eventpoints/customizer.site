<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Links",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class LinksDto
{
    public function __construct(
        private InputDto $linkColor = new InputDto(label: 'Link Color', type: InputTypeEnum::COLOR, default: '$primary'),
        private InputDto $linkDecoration = new InputDto(label: 'Link Decoration', type: InputTypeEnum::STRING, default: 'underline'),
        private InputDto $linkShadePercentage = new InputDto(label: 'Link Shade Percentage', type: InputTypeEnum::SIZE, default: '20%'),
        private InputDto $linkHoverColor = new InputDto(label: 'Link Hover Color', type: InputTypeEnum::COLOR, default: 'shift-color($link-color, $link-shade-percentage)'),
        private InputDto $linkHoverDecoration = new InputDto(label: 'Link Hover Decoration', type: InputTypeEnum::STRING, default: 'null'),
        private InputDto $stretchedLinkPseudoElement = new InputDto(label: 'Stretched Link Pseudo Element', type: InputTypeEnum::STRING, default: 'after'),
        private InputDto $stretchedLinkZIndex = new InputDto(label: 'Stretched Link Z Index', type: InputTypeEnum::INTEGER, default: '1'),
        private InputDto $iconLinkGap = new InputDto(label: 'Icon Link Gap', type: InputTypeEnum::SIZE, default: '.375rem'),
        private InputDto $iconLinkUnderlineOffset = new InputDto(label: 'Icon Link Underline Offset', type: InputTypeEnum::SIZE, default: '.25em'),
        private InputDto $iconLinkIconSize = new InputDto(label: 'Icon Link Icon Size', type: InputTypeEnum::SIZE, default: '1em'),
        private InputDto $iconLinkIconTransition = new InputDto(label: 'Icon Link Icon Transition', type: InputTypeEnum::STRING, default: '.2s ease-in-out transform'),
        private InputDto $iconLinkIconTransform = new InputDto(label: 'Icon Link Icon Transform', type: InputTypeEnum::STRING, default: 'translate3d(.25em, 0, 0)'),
    )
    {
    }

    public function getLinkColor(): InputDto
    {
        return $this->linkColor;
    }

    public function getLinkDecoration(): InputDto
    {
        return $this->linkDecoration;
    }

    public function getLinkShadePercentage(): InputDto
    {
        return $this->linkShadePercentage;
    }

    public function getLinkHoverColor(): InputDto
    {
        return $this->linkHoverColor;
    }

    public function getLinkHoverDecoration(): InputDto
    {
        return $this->linkHoverDecoration;
    }

    public function getStretchedLinkPseudoElement(): InputDto
    {
        return $this->stretchedLinkPseudoElement;
    }

    public function getStretchedLinkZIndex(): InputDto
    {
        return $this->stretchedLinkZIndex;
    }

    public function getIconLinkGap(): InputDto
    {
        return $this->iconLinkGap;
    }

    public function getIconLinkUnderlineOffset(): InputDto
    {
        return $this->iconLinkUnderlineOffset;
    }

    public function getIconLinkIconSize(): InputDto
    {
        return $this->iconLinkIconSize;
    }

    public function getIconLinkIconTransition(): InputDto
    {
        return $this->iconLinkIconTransition;
    }

    public function getIconLinkIconTransform(): InputDto
    {
        return $this->iconLinkIconTransform;
    }
}
