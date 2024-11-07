<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Z-Index Stack",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class ZIndexDto
{
    public function __construct(
        private InputDto $zIndexDropdown = new InputDto(label: 'Z-index Dropdown', type: InputTypeEnum::INTEGER, default: 1000),
        private InputDto $zIndexSticky = new InputDto(label: 'Z-index Sticky', type: InputTypeEnum::INTEGER, default: 1020),
        private InputDto $zIndexFixed = new InputDto(label: 'Z-index Fixed', type: InputTypeEnum::INTEGER, default: 1030),
        private InputDto $zIndexOffcanvasBackdrop = new InputDto(label: 'Z-index Offcanvas Backdrop', type: InputTypeEnum::INTEGER, default: 1040),
        private InputDto $zIndexOffcanvas = new InputDto(label: 'Z-index Offcanvas', type: InputTypeEnum::INTEGER, default: 1045),
        private InputDto $zIndexModalBackdrop = new InputDto(label: 'Z-index Modal Backdrop', type: InputTypeEnum::INTEGER, default: 1050),
        private InputDto $zIndexModal = new InputDto(label: 'Z-index Modal', type: InputTypeEnum::INTEGER, default: 1055),
        private InputDto $zIndexPopover = new InputDto(label: 'Z-index Popover', type: InputTypeEnum::INTEGER, default: 1070),
        private InputDto $zIndexTooltip = new InputDto(label: 'Z-index Tooltip', type: InputTypeEnum::INTEGER, default: 1080),
        private InputDto $zIndexToast = new InputDto(label: 'Z-index Toast', type: InputTypeEnum::INTEGER, default: 1090)
    ) {
    }

    public function getZIndexDropdown(): InputDto
    {
        return $this->zIndexDropdown;
    }

    public function getZIndexSticky(): InputDto
    {
        return $this->zIndexSticky;
    }

    public function getZIndexFixed(): InputDto
    {
        return $this->zIndexFixed;
    }

    public function getZIndexOffcanvasBackdrop(): InputDto
    {
        return $this->zIndexOffcanvasBackdrop;
    }

    public function getZIndexOffcanvas(): InputDto
    {
        return $this->zIndexOffcanvas;
    }

    public function getZIndexModalBackdrop(): InputDto
    {
        return $this->zIndexModalBackdrop;
    }

    public function getZIndexModal(): InputDto
    {
        return $this->zIndexModal;
    }

    public function getZIndexPopover(): InputDto
    {
        return $this->zIndexPopover;
    }

    public function getZIndexTooltip(): InputDto
    {
        return $this->zIndexTooltip;
    }

    public function getZIndexToast(): InputDto
    {
        return $this->zIndexToast;
    }
}
