<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\Attributes\ApiProperty;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;

#[OA\Schema(
    title: "Bootstrap 5.3 - Colors",
    type: "object",
)]
final readonly class ColorsDto
{

    /**
     * @param string|null $bodyBg
     * @param string|null $primary
     * @param string|null $secondary
     * @param string|null $success
     * @param string|null $info
     * @param string|null $warning
     * @param string|null $danger
     * @param string|null $light
     * @param string|null $dark
     * @param string|null $light
     * @param string|null $listGroupBg
     */
    public function __construct(
        #[ApiProperty(
            title: 'Body Background color value',
            inputType: InputTypeEnum::COLOR
        )]
        private null|string $bodyBg = '#FFFFFF',
        #[ApiProperty(
            title: 'Primary color value',
            inputType: InputTypeEnum::COLOR
        )]
        private null|string $primary = '#0d6efd',

        #[ApiProperty(
            title: 'Secondary color value',
            inputType: InputTypeEnum::COLOR
        )]
        private null|string $secondary = '#6c757d',
        #[ApiProperty(
            title: 'Success color value',
            inputType: InputTypeEnum::COLOR
        )]
        private null|string $success = '#198754',
        #[ApiProperty(
            title: 'Info color value',
            inputType: InputTypeEnum::COLOR
        )]
        private null|string $info = '#0dcaf0',
        #[ApiProperty(
            title: 'Warning color value',
            inputType: InputTypeEnum::COLOR
        )]
        private null|string $warning = '#ffc107',
        #[ApiProperty(
            title: 'Danger color value',
            inputType: InputTypeEnum::COLOR
        )]
        private null|string $danger = '#dc3545',
        #[ApiProperty(
            title: 'Light color value',
            inputType: InputTypeEnum::COLOR
        )]
        private null|string $light = '#f8f9fa',
        #[ApiProperty(
            title: 'Dark color value',
            inputType: InputTypeEnum::COLOR
        )]
        private null|string $dark = '#212529',
        #[ApiProperty(
            title: 'List Group Background Color',
            inputType: InputTypeEnum::COLOR
        )]
        private null|string $listGroupBg = '#333333',
    )
    {}

    public function getBodyBg(): ?string
    {
        return $this->bodyBg;
    }

    public function getPrimary(): ?string
    {
        return $this->primary;
    }

    public function getSecondary(): ?string
    {
        return $this->secondary;
    }

    public function getSuccess(): ?string
    {
        return $this->success;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function getWarning(): ?string
    {
        return $this->warning;
    }

    public function getDanger(): ?string
    {
        return $this->danger;
    }

    public function getLight(): ?string
    {
        return $this->light;
    }

    public function getDark(): ?string
    {
        return $this->dark;
    }

    public function getListGroupBg(): ?string
    {
        return $this->listGroupBg;
    }

}
