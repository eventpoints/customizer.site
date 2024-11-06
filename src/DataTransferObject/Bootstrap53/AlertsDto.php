<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Alerts",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class AlertsDto
{
    public function __construct(
        private InputDto $alertPaddingY = new InputDto(label: 'Alert Padding Y', type: InputTypeEnum::SIZE, default: '$spacer'),
        private InputDto $alertPaddingX = new InputDto(label: 'Alert Padding X', type: InputTypeEnum::SIZE, default: '$spacer'),
        private InputDto $alertMarginBottom = new InputDto(label: 'Alert Margin Bottom', type: InputTypeEnum::SIZE, default: '1rem'),
        private InputDto $alertBorderRadius = new InputDto(label: 'Alert Border Radius', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius)'),
        private InputDto $alertLinkFontWeight = new InputDto(label: 'Alert Link Font Weight', type: InputTypeEnum::INTEGER, default: '$font-weight-bold'),
        private InputDto $alertBorderWidth = new InputDto(label: 'Alert Border Width', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-width)'),
        private InputDto $alertDismissiblePaddingR = new InputDto(label: 'Alert Dismissible Padding R', type: InputTypeEnum::SIZE, default: '$alert-padding-x * 3')
    )
    {
    }

    public function getAlertPaddingY(): InputDto
    {
        return $this->alertPaddingY;
    }

    public function getAlertPaddingX(): InputDto
    {
        return $this->alertPaddingX;
    }

    public function getAlertMarginBottom(): InputDto
    {
        return $this->alertMarginBottom;
    }

    public function getAlertBorderRadius(): InputDto
    {
        return $this->alertBorderRadius;
    }

    public function getAlertLinkFontWeight(): InputDto
    {
        return $this->alertLinkFontWeight;
    }

    public function getAlertBorderWidth(): InputDto
    {
        return $this->alertBorderWidth;
    }

    public function getAlertDismissiblePaddingR(): InputDto
    {
        return $this->alertDismissiblePaddingR;
    }
}
