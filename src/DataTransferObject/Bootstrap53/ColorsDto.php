<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Colors",
    type: "object",
)]
#[Groups(['form', 'compile', 'ai-generator'])]
final readonly class ColorsDto
{

    /**
     * Constructor to initialize color variables as InputDto objects
     *
     * @param InputDto $primary
     * @param InputDto $secondary
     * @param InputDto $success
     * @param InputDto $info
     * @param InputDto $warning
     * @param InputDto $danger
     * @param InputDto $light
     * @param InputDto $dark
     */
    public function __construct(
        private InputDto $primary = new InputDto(label: 'Primary', type: InputTypeEnum::COLOR, default: '#0d6efd', isAiGenerable: true),
        private InputDto $secondary = new InputDto(label: 'Secondary', type: InputTypeEnum::COLOR, default: '#6c757d', isAiGenerable: true),
        private InputDto $success = new InputDto(label: 'Success', type: InputTypeEnum::COLOR, default: '#198754', isAiGenerable: true),
        private InputDto $info = new InputDto(label: 'Info', type: InputTypeEnum::COLOR, default: '#0dcaf0', isAiGenerable: true),
        private InputDto $warning = new InputDto(label: 'Warning', type: InputTypeEnum::COLOR, default: '#ffc107', isAiGenerable: true),
        private InputDto $danger = new InputDto(label: 'Danger', type: InputTypeEnum::COLOR, default: '#dc3545', isAiGenerable: true),
        private InputDto $light = new InputDto(label: 'Light', type: InputTypeEnum::COLOR, default: '#f8f9fa', isAiGenerable: true),
        private InputDto $dark = new InputDto(label: 'Dark', type: InputTypeEnum::COLOR, default: '#212529', isAiGenerable: true),
        private InputDto $blue = new InputDto(label: 'Blue', type: InputTypeEnum::COLOR, default: '#0d6efd', isAiGenerable: true),
        private InputDto $indigo = new InputDto(label: 'Indigo', type: InputTypeEnum::COLOR, default: '#6610f2', isAiGenerable: true),
        private InputDto $purple = new InputDto(label: 'Purple', type: InputTypeEnum::COLOR, default: '#6f42c1', isAiGenerable: true),
        private InputDto $pink = new InputDto(label: 'Pink', type: InputTypeEnum::COLOR, default: '#d63384', isAiGenerable: true),
        private InputDto $red = new InputDto(label: 'Red', type: InputTypeEnum::COLOR, default: '#dc3545', isAiGenerable: true),
        private InputDto $orange = new InputDto(label: 'Orange', type: InputTypeEnum::COLOR, default: '#fd7e14', isAiGenerable: true),
        private InputDto $yellow = new InputDto(label: 'Yellow', type: InputTypeEnum::COLOR, default: '#ffc107', isAiGenerable: true),
        private InputDto $green = new InputDto(label: 'Green', type: InputTypeEnum::COLOR, default: '#198754', isAiGenerable: true),
        private InputDto $teal = new InputDto(label: 'Teal', type: InputTypeEnum::COLOR, default: '#20c997', isAiGenerable: true),
        private InputDto $cyan = new InputDto(label: 'Cyan', type: InputTypeEnum::COLOR, default: '#0dcaf0', isAiGenerable: true),
        private InputDto $white = new InputDto(label: 'White', type: InputTypeEnum::COLOR, default: '#ffffff', isAiGenerable: true),
        private InputDto $gray100 = new InputDto(label: 'Gray 100', type: InputTypeEnum::COLOR, default: '#f8f9fa', isAiGenerable: true),
        private InputDto $gray200 = new InputDto(label: 'Gray 200', type: InputTypeEnum::COLOR, default: '#e9ecef', isAiGenerable: true),
        private InputDto $gray300 = new InputDto(label: 'Gray 300', type: InputTypeEnum::COLOR, default: '#dee2e6', isAiGenerable: true),
        private InputDto $gray400 = new InputDto(label: 'Gray 400', type: InputTypeEnum::COLOR, default: '#ced4da', isAiGenerable: true),
        private InputDto $gray500 = new InputDto(label: 'Gray 500', type: InputTypeEnum::COLOR, default: '#adb5bd', isAiGenerable: true),
        private InputDto $gray600 = new InputDto(label: 'Gray 600', type: InputTypeEnum::COLOR, default: '#6c757d', isAiGenerable: true),
        private InputDto $gray700 = new InputDto(label: 'Gray 700', type: InputTypeEnum::COLOR, default: '#495057', isAiGenerable: true),
        private InputDto $gray800 = new InputDto(label: 'Gray 800', type: InputTypeEnum::COLOR, default: '#343a40', isAiGenerable: true),
        private InputDto $gray900 = new InputDto(label: 'Gray 900', type: InputTypeEnum::COLOR, default: '#212529', isAiGenerable: true),
        private InputDto $black = new InputDto(label: 'Black', type: InputTypeEnum::COLOR, default: '#000000', isAiGenerable: false),
    ) {}

    public function getBodyBg(): InputDto
    {
        return $this->bodyBg;
    }

    public function getPrimary(): InputDto
    {
        return $this->primary;
    }

    public function getSecondary(): InputDto
    {
        return $this->secondary;
    }

    public function getSuccess(): InputDto
    {
        return $this->success;
    }

    public function getInfo(): InputDto
    {
        return $this->info;
    }

    public function getWarning(): InputDto
    {
        return $this->warning;
    }

    public function getDanger(): InputDto
    {
        return $this->danger;
    }

    public function getLight(): InputDto
    {
        return $this->light;
    }

    public function getDark(): InputDto
    {
        return $this->dark;
    }

    public function getBlue(): InputDto
    {
        return $this->blue;
    }

    public function getIndigo(): InputDto
    {
        return $this->indigo;
    }

    public function getPurple(): InputDto
    {
        return $this->purple;
    }

    public function getPink(): InputDto
    {
        return $this->pink;
    }

    public function getRed(): InputDto
    {
        return $this->red;
    }

    public function getOrange(): InputDto
    {
        return $this->orange;
    }

    public function getYellow(): InputDto
    {
        return $this->yellow;
    }

    public function getGreen(): InputDto
    {
        return $this->green;
    }

    public function getTeal(): InputDto
    {
        return $this->teal;
    }

    public function getCyan(): InputDto
    {
        return $this->cyan;
    }

    public function getWhite(): InputDto
    {
        return $this->white;
    }

    public function getGray100(): InputDto
    {
        return $this->gray100;
    }

    public function getGray200(): InputDto
    {
        return $this->gray200;
    }

    public function getGray300(): InputDto
    {
        return $this->gray300;
    }

    public function getGray400(): InputDto
    {
        return $this->gray400;
    }

    public function getGray500(): InputDto
    {
        return $this->gray500;
    }

    public function getGray600(): InputDto
    {
        return $this->gray600;
    }

    public function getGray700(): InputDto
    {
        return $this->gray700;
    }

    public function getGray800(): InputDto
    {
        return $this->gray800;
    }

    public function getGray900(): InputDto
    {
        return $this->gray900;
    }

    public function getBlack(): InputDto
    {
        return $this->black;
    }

}
