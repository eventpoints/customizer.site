<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Modals",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class ModalsDto
{
    public function __construct(
        private InputDto $modalInnerPadding = new InputDto(label: 'Modal Inner Padding', type: InputTypeEnum::SIZE, default: '$spacer'),
        private InputDto $modalFooterMarginBetween = new InputDto(label: 'Modal Footer Margin Between', type: InputTypeEnum::SIZE, default: '.5rem'),
        private InputDto $modalDialogMargin = new InputDto(label: 'Modal Dialog Margin', type: InputTypeEnum::SIZE, default: '.5rem'),
        private InputDto $modalDialogMarginYSmUp = new InputDto(label: 'Modal Dialog Margin Y Sm Up', type: InputTypeEnum::SIZE, default: '1.75rem'),
        private InputDto $modalTitleLineHeight = new InputDto(label: 'Modal Title Line Height', type: InputTypeEnum::SIZE, default: '$line-height-base'),
        private InputDto $modalContentColor = new InputDto(label: 'Modal Content Color', type: InputTypeEnum::COLOR, default: 'null'), // Assuming color type
        private InputDto $modalContentBg = new InputDto(label: 'Modal Content Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-bg)'), // Assuming color type
        private InputDto $modalContentBorderColor = new InputDto(label: 'Modal Content Border Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}border-color-translucent)'), // Assuming color type
        private InputDto $modalContentBorderWidth = new InputDto(label: 'Modal Content Border Width', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-width)'),
        private InputDto $modalContentBorderRadius = new InputDto(label: 'Modal Content Border Radius', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius-lg)'),
        private InputDto $modalContentInnerBorderRadius = new InputDto(label: 'Modal Content Inner Border Radius', type: InputTypeEnum::SIZE, default: 'subtract($modal-content-border-radius, $modal-content-border-width)'),
        private InputDto $modalContentBoxShadowXs = new InputDto(label: 'Modal Content Box Shadow Xs', type: InputTypeEnum::STRING, default: 'var(--#{$prefix}box-shadow-sm)'),
        private InputDto $modalContentBoxShadowSmUp = new InputDto(label: 'Modal Content Box Shadow Sm Up', type: InputTypeEnum::STRING, default: 'var(--#{$prefix}box-shadow)'),
        private InputDto $modalBackdropBg = new InputDto(label: 'Modal Backdrop Bg', type: InputTypeEnum::COLOR, default: '$black'), // Assuming color type
        private InputDto $modalBackdropOpacity = new InputDto(label: 'Modal Backdrop Opacity', type: InputTypeEnum::FLOAT, default: '.5'),
        private InputDto $modalHeaderBorderColor = new InputDto(label: 'Modal Header Border Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}border-color)'), // Assuming color type
        private InputDto $modalHeaderBorderWidth = new InputDto(label: 'Modal Header Border Width', type: InputTypeEnum::SIZE, default: '$modal-content-border-width'),
        private InputDto $modalHeaderPaddingY = new InputDto(label: 'Modal Header Padding Y', type: InputTypeEnum::SIZE, default: '$modal-inner-padding'),
        private InputDto $modalHeaderPaddingX = new InputDto(label: 'Modal Header Padding X', type: InputTypeEnum::SIZE, default: '$modal-inner-padding'),
        private InputDto $modalHeaderPadding = new InputDto(label: 'Modal Header Padding', type: InputTypeEnum::STRING, default: '$modal-header-padding-y $modal-header-padding-x'), // Assuming string type for backwards compatibility
        private InputDto $modalFooterBg = new InputDto(label: 'Modal Footer Bg', type: InputTypeEnum::COLOR, default: 'null'), // Assuming color type
        private InputDto $modalFooterBorderColor = new InputDto(label: 'Modal Footer Border Color', type: InputTypeEnum::COLOR, default: '$modal-header-border-color'), // Assuming color type
        private InputDto $modalFooterBorderWidth = new InputDto(label: 'Modal Footer Border Width', type: InputTypeEnum::SIZE, default: '$modal-header-border-width'),
        private InputDto $modalSm = new InputDto(label: 'Modal Sm', type: InputTypeEnum::SIZE, default: '300px'),
        private InputDto $modalMd = new InputDto(label: 'Modal Md', type: InputTypeEnum::SIZE, default: '500px'),
        private InputDto $modalLg = new InputDto(label: 'Modal Lg', type: InputTypeEnum::SIZE, default: '800px'),
        private InputDto $modalXl = new InputDto(label: 'Modal Xl', type: InputTypeEnum::SIZE, default: '1140px'),
        private InputDto $modalFadeTransform = new InputDto(label: 'Modal Fade Transform', type: InputTypeEnum::STRING, default: 'translate(0, -50px)'),
        private InputDto $modalShowTransform = new InputDto(label: 'Modal Show Transform', type: InputTypeEnum::STRING, default: 'none'),
        private InputDto $modalTransition = new InputDto(label: 'Modal Transition', type: InputTypeEnum::STRING, default: 'transform .3s ease-out'),
        private InputDto $modalScaleTransform = new InputDto(label: 'Modal Scale Transform', type: InputTypeEnum::STRING, default: 'scale(1.02)')
    )
    {
    }

    public function getModalInnerPadding(): InputDto
    {
        return $this->modalInnerPadding;
    }

    public function getModalFooterMarginBetween(): InputDto
    {
        return $this->modalFooterMarginBetween;
    }

    public function getModalDialogMargin(): InputDto
    {
        return $this->modalDialogMargin;
    }

    public function getModalDialogMarginYSmUp(): InputDto
    {
        return $this->modalDialogMarginYSmUp;
    }

    public function getModalTitleLineHeight(): InputDto
    {
        return $this->modalTitleLineHeight;
    }

    public function getModalContentColor(): InputDto
    {
        return $this->modalContentColor;
    }

    public function getModalContentBg(): InputDto
    {
        return $this->modalContentBg;
    }

    public function getModalContentBorderColor(): InputDto
    {
        return $this->modalContentBorderColor;
    }

    public function getModalContentBorderWidth(): InputDto
    {
        return $this->modalContentBorderWidth;
    }

    public function getModalContentBorderRadius(): InputDto
    {
        return $this->modalContentBorderRadius;
    }

    public function getModalContentInnerBorderRadius(): InputDto
    {
        return $this->modalContentInnerBorderRadius;
    }

    public function getModalContentBoxShadowXs(): InputDto
    {
        return $this->modalContentBoxShadowXs;
    }

    public function getModalContentBoxShadowSmUp(): InputDto
    {
        return $this->modalContentBoxShadowSmUp;
    }

    public function getModalBackdropBg(): InputDto
    {
        return $this->modalBackdropBg;
    }

    public function getModalBackdropOpacity(): InputDto
    {
        return $this->modalBackdropOpacity;
    }

    public function getModalHeaderBorderColor(): InputDto
    {
        return $this->modalHeaderBorderColor;
    }

    public function getModalHeaderBorderWidth(): InputDto
    {
        return $this->modalHeaderBorderWidth;
    }

    public function getModalHeaderPaddingY(): InputDto
    {
        return $this->modalHeaderPaddingY;
    }

    public function getModalHeaderPaddingX(): InputDto
    {
        return $this->modalHeaderPaddingX;
    }

    public function getModalHeaderPadding(): InputDto
    {
        return $this->modalHeaderPadding;
    }

    public function getModalFooterBg(): InputDto
    {
        return $this->modalFooterBg;
    }

    public function getModalFooterBorderColor(): InputDto
    {
        return $this->modalFooterBorderColor;
    }

    public function getModalFooterBorderWidth(): InputDto
    {
        return $this->modalFooterBorderWidth;
    }

    public function getModalSm(): InputDto
    {
        return $this->modalSm;
    }

    public function getModalMd(): InputDto
    {
        return $this->modalMd;
    }

    public function getModalLg(): InputDto
    {
        return $this->modalLg;
    }

    public function getModalXl(): InputDto
    {
        return $this->modalXl;
    }

    public function getModalFadeTransform(): InputDto
    {
        return $this->modalFadeTransform;
    }

    public function getModalShowTransform(): InputDto
    {
        return $this->modalShowTransform;
    }

    public function getModalTransition(): InputDto
    {
        return $this->modalTransition;
    }

    public function getModalScaleTransform(): InputDto
    {
        return $this->modalScaleTransform;
    }
}
