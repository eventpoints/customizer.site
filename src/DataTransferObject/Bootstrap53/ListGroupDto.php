<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - List Group",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class ListGroupDto
{
    public function __construct(
        private InputDto $listGroupColor = new InputDto(label: 'List Group Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-color)'),
        private InputDto $listGroupBg = new InputDto(label: 'List Group Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-bg)'),
        private InputDto $listGroupBorderColor = new InputDto(label: 'List Group Border Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}border-color)'),
        private InputDto $listGroupBorderWidth = new InputDto(label: 'List Group Border Width', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-width)'),
        private InputDto $listGroupBorderRadius = new InputDto(label: 'List Group Border Radius', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius)'),

        private InputDto $listGroupItemPaddingY = new InputDto(label: 'List Group Item Padding Y', type: InputTypeEnum::SIZE, default: '$spacer * .5'),
        private InputDto $listGroupItemPaddingX = new InputDto(label: 'List Group Item Padding X', type: InputTypeEnum::SIZE, default: '$spacer'),
        private InputDto $listGroupItemBgScale = new InputDto(label: 'List Group Item Bg Scale', type: InputTypeEnum::FLOAT, default: '-80%'), // Deprecated in v5.3.0
        private InputDto $listGroupItemColorScale = new InputDto(label: 'List Group Item Color Scale', type: InputTypeEnum::FLOAT, default: '40%'), // Deprecated in v5.3.0

        private InputDto $listGroupHoverBg = new InputDto(label: 'List Group Hover Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}tertiary-bg)'),
        private InputDto $listGroupActiveColor = new InputDto(label: 'List Group Active Color', type: InputTypeEnum::COLOR, default: '$component-active-color'),
        private InputDto $listGroupActiveBg = new InputDto(label: 'List Group Active Bg', type: InputTypeEnum::COLOR, default: '$component-active-bg'),
        private InputDto $listGroupActiveBorderColor = new InputDto(label: 'List Group Active Border Color', type: InputTypeEnum::COLOR, default: '$list-group-active-bg'),

        private InputDto $listGroupDisabledColor = new InputDto(label: 'List Group Disabled Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-color)'),
        private InputDto $listGroupDisabledBg = new InputDto(label: 'List Group Disabled Bg', type: InputTypeEnum::COLOR, default: '$list-group-bg'),

        private InputDto $listGroupActionColor = new InputDto(label: 'List Group Action Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-color)'),
        private InputDto $listGroupActionHoverColor = new InputDto(label: 'List Group Action Hover Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}emphasis-color)'),

        private InputDto $listGroupActionActiveColor = new InputDto(label: 'List Group Action Active Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-color)'),
        private InputDto $listGroupActionActiveBg = new InputDto(label: 'List Group Action Active Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-bg)'),
    )
    {
    }

    public function getListGroupColor(): InputDto
    {
        return $this->listGroupColor;
    }

    public function getListGroupBg(): InputDto
    {
        return $this->listGroupBg;
    }

    public function getListGroupBorderColor(): InputDto
    {
        return $this->listGroupBorderColor;
    }

    public function getListGroupBorderWidth(): InputDto
    {
        return $this->listGroupBorderWidth;
    }

    public function getListGroupBorderRadius(): InputDto
    {
        return $this->listGroupBorderRadius;
    }

    public function getListGroupItemPaddingY(): InputDto
    {
        return $this->listGroupItemPaddingY;
    }

    public function getListGroupItemPaddingX(): InputDto
    {
        return $this->listGroupItemPaddingX;
    }

    public function getListGroupItemBgScale(): InputDto
    {
        return $this->listGroupItemBgScale;
    }

    public function getListGroupItemColorScale(): InputDto
    {
        return $this->listGroupItemColorScale;
    }

    public function getListGroupHoverBg(): InputDto
    {
        return $this->listGroupHoverBg;
    }

    public function getListGroupActiveColor(): InputDto
    {
        return $this->listGroupActiveColor;
    }

    public function getListGroupActiveBg(): InputDto
    {
        return $this->listGroupActiveBg;
    }

    public function getListGroupActiveBorderColor(): InputDto
    {
        return $this->listGroupActiveBorderColor;
    }

    public function getListGroupDisabledColor(): InputDto
    {
        return $this->listGroupDisabledColor;
    }

    public function getListGroupDisabledBg(): InputDto
    {
        return $this->listGroupDisabledBg;
    }

    public function getListGroupActionColor(): InputDto
    {
        return $this->listGroupActionColor;
    }

    public function getListGroupActionHoverColor(): InputDto
    {
        return $this->listGroupActionHoverColor;
    }

    public function getListGroupActionActiveColor(): InputDto
    {
        return $this->listGroupActionActiveColor;
    }

    public function getListGroupActionActiveBg(): InputDto
    {
        return $this->listGroupActionActiveBg;
    }
}
