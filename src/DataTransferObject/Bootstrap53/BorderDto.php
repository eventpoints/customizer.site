<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Body",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class BorderDto
{
    public function __construct(
        private InputDto $borderWidth = new InputDto(label: 'Border Width', type: InputTypeEnum::SIZE, default: '1px', isLocked: true),
        private InputDto $borderStyle = new InputDto(label: 'Border Style', type: InputTypeEnum::STRING, default: 'solid', isLocked: true),
        private InputDto $borderColor = new InputDto(label: 'Border Color', type: InputTypeEnum::COLOR, default: '$gray-300'),
        private InputDto $borderColorTranslucent = new InputDto(label: 'Border Color Translucent', type: InputTypeEnum::COLOR, default: 'rgba($black, .175)', isLocked: true),
        private InputDto $borderRadius = new InputDto(label: 'Border Radius', type: InputTypeEnum::SIZE, default: '.375rem', isLocked: true),
        private InputDto $borderRadiusSm = new InputDto(label: 'Border Radius Sm', type: InputTypeEnum::SIZE, default: '.25rem', isLocked: true),
        private InputDto $borderRadiusLg = new InputDto(label: 'Border Radius Lg', type: InputTypeEnum::SIZE, default: '.5rem', isLocked: true),
        private InputDto $borderRadiusXl = new InputDto(label: 'Border Radius Xl', type: InputTypeEnum::SIZE, default: '1rem', isLocked: true),
        private InputDto $borderRadiusXxl = new InputDto(label: 'Border Radius Xxl', type: InputTypeEnum::SIZE, default: '2rem', isLocked: true),
        private InputDto $borderRadiusPill = new InputDto(label: 'Border Radius Pill', type: InputTypeEnum::SIZE, default: '50rem', isLocked: true),
        private InputDto $borderRadius2xl = new InputDto(label: 'Border Radius2xl', type: InputTypeEnum::SIZE, default: '$border-radius-xxl', isLocked: true),
    )
    {
    }

    public function getBorderWidth(): InputDto
    {
        return $this->borderWidth;
    }

    public function getBorderStyle(): InputDto
    {
        return $this->borderStyle;
    }

    public function getBorderColor(): InputDto
    {
        return $this->borderColor;
    }

    public function getBorderColorTranslucent(): InputDto
    {
        return $this->borderColorTranslucent;
    }

    public function getBorderRadius(): InputDto
    {
        return $this->borderRadius;
    }

    public function getBorderRadiusSm(): InputDto
    {
        return $this->borderRadiusSm;
    }

    public function getBorderRadiusLg(): InputDto
    {
        return $this->borderRadiusLg;
    }

    public function getBorderRadiusXl(): InputDto
    {
        return $this->borderRadiusXl;
    }

    public function getBorderRadiusXxl(): InputDto
    {
        return $this->borderRadiusXxl;
    }

    public function getBorderRadiusPill(): InputDto
    {
        return $this->borderRadiusPill;
    }

    public function getBorderRadius2xl(): InputDto
    {
        return $this->borderRadius2xl;
    }
}
