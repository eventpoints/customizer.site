<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Tables",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class TablesDto
{
    public function __construct(
        // Table Cell Padding
        private InputDto $tableCellPaddingY = new InputDto(label: 'Table Cell Padding Y', type: InputTypeEnum::SIZE, default: '.5rem'),
        private InputDto $tableCellPaddingX = new InputDto(label: 'Table Cell Padding X', type: InputTypeEnum::SIZE, default: '.5rem'),
        private InputDto $tableCellPaddingYSm = new InputDto(label: 'Table Cell Padding Y Small', type: InputTypeEnum::SIZE, default: '.25rem'),
        private InputDto $tableCellPaddingXSm = new InputDto(label: 'Table Cell Padding X Small', type: InputTypeEnum::SIZE, default: '.25rem'),

        // Table Cell Vertical Align
        private InputDto $tableCellVerticalAlign = new InputDto(label: 'Table Cell Vertical Align', type: InputTypeEnum::STRING, default: 'top'),

        // Table Colors and Backgrounds
        private InputDto $tableColor = new InputDto(label: 'Table Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}emphasis-color)'),
        private InputDto $tableBg = new InputDto(label: 'Table Background', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-bg)'),
        private InputDto $tableAccentBg = new InputDto(label: 'Table Accent Background', type: InputTypeEnum::STRING, default: 'transparent'),

        // Table Header Font Weight
        private InputDto $tableThFontWeight = new InputDto(label: 'Table Header Font Weight', type: InputTypeEnum::STRING, default: 'null'),

        // Table Striped Colors and Backgrounds
        private InputDto $tableStripedColor = new InputDto(label: 'Table Striped Color', type: InputTypeEnum::COLOR, default: '$table-color'),
        private InputDto $tableStripedBgFactor = new InputDto(label: 'Table Striped Background Factor', type: InputTypeEnum::FLOAT, default: '.05'),
        private InputDto $tableStripedBg = new InputDto(label: 'Table Striped Background', type: InputTypeEnum::COLOR, default: 'rgba(var(--#{$prefix}emphasis-color-rgb), $table-striped-bg-factor)'),

        // Table Active Colors and Backgrounds
        private InputDto $tableActiveColor = new InputDto(label: 'Table Active Color', type: InputTypeEnum::COLOR, default: '$table-color'),
        private InputDto $tableActiveBgFactor = new InputDto(label: 'Table Active Background Factor', type: InputTypeEnum::FLOAT, default: '.1'),
        private InputDto $tableActiveBg = new InputDto(label: 'Table Active Background', type: InputTypeEnum::COLOR, default: 'rgba(var(--#{$prefix}emphasis-color-rgb), $table-active-bg-factor)'),

        // Table Hover Colors and Backgrounds
        private InputDto $tableHoverColor = new InputDto(label: 'Table Hover Color', type: InputTypeEnum::COLOR, default: '$table-color'),
        private InputDto $tableHoverBgFactor = new InputDto(label: 'Table Hover Background Factor', type: InputTypeEnum::FLOAT, default: '.075'),
        private InputDto $tableHoverBg = new InputDto(label: 'Table Hover Background', type: InputTypeEnum::COLOR, default: 'rgba(var(--#{$prefix}emphasis-color-rgb), $table-hover-bg-factor)'),

        // Table Borders
        private InputDto $tableBorderFactor = new InputDto(label: 'Table Border Factor', type: InputTypeEnum::FLOAT, default: '.2'),
        private InputDto $tableBorderWidth = new InputDto(label: 'Table Border Width', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-width)'),
        private InputDto $tableBorderColor = new InputDto(label: 'Table Border Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}border-color)'),

        // Table Striped Orders
        private InputDto $tableStripedOrder = new InputDto(label: 'Table Striped Order', type: InputTypeEnum::STRING, default: 'odd'),
        private InputDto $tableStripedColumnsOrder = new InputDto(label: 'Table Striped Columns Order', type: InputTypeEnum::STRING, default: 'even'),

        // Table Group Separator Color
        private InputDto $tableGroupSeparatorColor = new InputDto(label: 'Table Group Separator Color', type: InputTypeEnum::COLOR, default: 'currentcolor'),

        // Table Caption Color
        private InputDto $tableCaptionColor = new InputDto(label: 'Table Caption Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-color)'),

        // Table Background Scale
        private InputDto $tableBgScale = new InputDto(label: 'Table Background Scale', type: InputTypeEnum::STRING, default: '-80%')
    )
    {
    }

    public function getTableCellPaddingY(): InputDto
    {
        return $this->tableCellPaddingY;
    }

    public function getTableCellPaddingX(): InputDto
    {
        return $this->tableCellPaddingX;
    }

    public function getTableCellPaddingYSm(): InputDto
    {
        return $this->tableCellPaddingYSm;
    }

    public function getTableCellPaddingXSm(): InputDto
    {
        return $this->tableCellPaddingXSm;
    }

    public function getTableCellVerticalAlign(): InputDto
    {
        return $this->tableCellVerticalAlign;
    }

    public function getTableColor(): InputDto
    {
        return $this->tableColor;
    }

    public function getTableBg(): InputDto
    {
        return $this->tableBg;
    }

    public function getTableAccentBg(): InputDto
    {
        return $this->tableAccentBg;
    }

    public function getTableThFontWeight(): InputDto
    {
        return $this->tableThFontWeight;
    }

    public function getTableStripedColor(): InputDto
    {
        return $this->tableStripedColor;
    }

    public function getTableStripedBgFactor(): InputDto
    {
        return $this->tableStripedBgFactor;
    }

    public function getTableStripedBg(): InputDto
    {
        return $this->tableStripedBg;
    }

    public function getTableActiveColor(): InputDto
    {
        return $this->tableActiveColor;
    }

    public function getTableActiveBgFactor(): InputDto
    {
        return $this->tableActiveBgFactor;
    }

    public function getTableActiveBg(): InputDto
    {
        return $this->tableActiveBg;
    }

    public function getTableHoverColor(): InputDto
    {
        return $this->tableHoverColor;
    }

    public function getTableHoverBgFactor(): InputDto
    {
        return $this->tableHoverBgFactor;
    }

    public function getTableHoverBg(): InputDto
    {
        return $this->tableHoverBg;
    }

    public function getTableBorderFactor(): InputDto
    {
        return $this->tableBorderFactor;
    }

    public function getTableBorderWidth(): InputDto
    {
        return $this->tableBorderWidth;
    }

    public function getTableBorderColor(): InputDto
    {
        return $this->tableBorderColor;
    }

    public function getTableStripedOrder(): InputDto
    {
        return $this->tableStripedOrder;
    }

    public function getTableStripedColumnsOrder(): InputDto
    {
        return $this->tableStripedColumnsOrder;
    }

    public function getTableGroupSeparatorColor(): InputDto
    {
        return $this->tableGroupSeparatorColor;
    }

    public function getTableCaptionColor(): InputDto
    {
        return $this->tableCaptionColor;
    }

    public function getTableBgScale(): InputDto
    {
        return $this->tableBgScale;
    }

}
