<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Spinners",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class SpinnersDto
{
    public function __construct(
        private InputDto $spinnerWidth = new InputDto(label: 'Spinner Width', type: InputTypeEnum::SIZE, default: '2rem'),
        private InputDto $spinnerHeight = new InputDto(label: 'Spinner Height', type: InputTypeEnum::SIZE, default: '2rem'), // Assuming it should be the same as $spinner-width
        private InputDto $spinnerVerticalAlign = new InputDto(label: 'Spinner Vertical Align', type: InputTypeEnum::SIZE, default: '-0.125em'), // Not sure if this should be SIZE or FLOAT
        private InputDto $spinnerBorderWidth = new InputDto(label: 'Spinner Border Width', type: InputTypeEnum::SIZE, default: '0.25em'),
        private InputDto $spinnerAnimationSpeed = new InputDto(label: 'Spinner Animation Speed', type: InputTypeEnum::STRING, default: '0.75s'),

        private InputDto $spinnerWidthSm = new InputDto(label: 'Spinner Width Sm', type: InputTypeEnum::SIZE, default: '1rem'),
        private InputDto $spinnerHeightSm = new InputDto(label: 'Spinner Height Sm', type: InputTypeEnum::SIZE, default: '1rem'), // Assuming it should be the same as $spinner-width-sm
        private InputDto $spinnerBorderWidthSm = new InputDto(label: 'Spinner Border Width Sm', type: InputTypeEnum::SIZE, default: '0.2em')
    ) {}

    public function getSpinnerWidth(): InputDto
    {
        return $this->spinnerWidth;
    }

    public function getSpinnerHeight(): InputDto
    {
        return $this->spinnerHeight;
    }

    public function getSpinnerVerticalAlign(): InputDto
    {
        return $this->spinnerVerticalAlign;
    }

    public function getSpinnerBorderWidth(): InputDto
    {
        return $this->spinnerBorderWidth;
    }

    public function getSpinnerAnimationSpeed(): InputDto
    {
        return $this->spinnerAnimationSpeed;
    }

    public function getSpinnerWidthSm(): InputDto
    {
        return $this->spinnerWidthSm;
    }

    public function getSpinnerHeightSm(): InputDto
    {
        return $this->spinnerHeightSm;
    }

    public function getSpinnerBorderWidthSm(): InputDto
    {
        return $this->spinnerBorderWidthSm;
    }
}
