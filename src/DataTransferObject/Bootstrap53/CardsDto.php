<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Cards",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class CardsDto
{
    public function __construct(
        private InputDto $cardSpacerY = new InputDto(label: 'Card Spacer Y', type: InputTypeEnum::SIZE, default: '$spacer', isLocked: true),
        private InputDto $cardSpacerX = new InputDto(label: 'Card Spacer X', type: InputTypeEnum::SIZE, default: '$spacer', isLocked: true),
        private InputDto $cardTitleSpacerY = new InputDto(label: 'Card Title Spacer Y', type: InputTypeEnum::SIZE, default: '$spacer * .5', isLocked: true),
        private InputDto $cardTitleColor = new InputDto(label: 'Card Title Color', type: InputTypeEnum::COLOR, default: 'null'), // Assuming color type
        private InputDto $cardSubtitleColor = new InputDto(label: 'Card Subtitle Color', type: InputTypeEnum::COLOR, default: 'null'), // Assuming color type
        private InputDto $cardBorderWidth = new InputDto(label: 'Card Border Width', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-width)', isLocked: true),
        private InputDto $cardBorderColor = new InputDto(label: 'Card Border Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}border-color-translucent)', isLocked: true),
        private InputDto $cardBorderRadius = new InputDto(label: 'Card Border Radius', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius)', isLocked: true),
        private InputDto $cardBoxShadow = new InputDto(label: 'Card Box Shadow', type: InputTypeEnum::STRING, default: 'null', isLocked: true), // Assuming string type
        private InputDto $cardInnerBorderRadius = new InputDto(label: 'Card Inner Border Radius', type: InputTypeEnum::SIZE, default: 'subtract($card-border-radius, $card-border-width)', isLocked: true),
        private InputDto $cardCapPaddingY = new InputDto(label: 'Card Cap Padding Y', type: InputTypeEnum::SIZE, default: '$card-spacer-y * .5'),
        private InputDto $cardCapPaddingX = new InputDto(label: 'Card Cap Padding X', type: InputTypeEnum::SIZE, default: '$card-spacer-x'),
        private InputDto $cardCapBg = new InputDto(label: 'Card Cap Bg', type: InputTypeEnum::COLOR, default: 'rgba(var(--#{$prefix}body-color-rgb), .03)'),
        private InputDto $cardCapColor = new InputDto(label: 'Card Cap Color', type: InputTypeEnum::COLOR, default: 'null'), // Assuming color type
        private InputDto $cardHeight = new InputDto(label: 'Card Height', type: InputTypeEnum::SIZE, default: 'null', isLocked: true), // Assuming size type
        private InputDto $cardColor = new InputDto(label: 'Card Color', type: InputTypeEnum::COLOR, default: 'null', isLocked: true), // Assuming color type
        private InputDto $cardBg = new InputDto(label: 'Card Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-bg)'),
        private InputDto $cardImgOverlayPadding = new InputDto(label: 'Card Img Overlay Padding', type: InputTypeEnum::SIZE, default: '$spacer', isLocked: true),
        private InputDto $cardGroupMargin = new InputDto(label: 'Card Group Margin', type: InputTypeEnum::SIZE, default: '$grid-gutter-width * .5', isLocked: true)
    )
    {
    }

    public function getCardSpacerY(): InputDto
    {
        return $this->cardSpacerY;
    }

    public function getCardSpacerX(): InputDto
    {
        return $this->cardSpacerX;
    }

    public function getCardTitleSpacerY(): InputDto
    {
        return $this->cardTitleSpacerY;
    }

    public function getCardTitleColor(): InputDto
    {
        return $this->cardTitleColor;
    }

    public function getCardSubtitleColor(): InputDto
    {
        return $this->cardSubtitleColor;
    }

    public function getCardBorderWidth(): InputDto
    {
        return $this->cardBorderWidth;
    }

    public function getCardBorderColor(): InputDto
    {
        return $this->cardBorderColor;
    }

    public function getCardBorderRadius(): InputDto
    {
        return $this->cardBorderRadius;
    }

    public function getCardBoxShadow(): InputDto
    {
        return $this->cardBoxShadow;
    }

    public function getCardInnerBorderRadius(): InputDto
    {
        return $this->cardInnerBorderRadius;
    }

    public function getCardCapPaddingY(): InputDto
    {
        return $this->cardCapPaddingY;
    }

    public function getCardCapPaddingX(): InputDto
    {
        return $this->cardCapPaddingX;
    }

    public function getCardCapBg(): InputDto
    {
        return $this->cardCapBg;
    }

    public function getCardCapColor(): InputDto
    {
        return $this->cardCapColor;
    }

    public function getCardHeight(): InputDto
    {
        return $this->cardHeight;
    }

    public function getCardColor(): InputDto
    {
        return $this->cardColor;
    }

    public function getCardBg(): InputDto
    {
        return $this->cardBg;
    }

    public function getCardImgOverlayPadding(): InputDto
    {
        return $this->cardImgOverlayPadding;
    }

    public function getCardGroupMargin(): InputDto
    {
        return $this->cardGroupMargin;
    }
}
