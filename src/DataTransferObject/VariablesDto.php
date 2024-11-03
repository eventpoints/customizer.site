<?php

namespace App\DataTransferObject;

use OpenApi\Attributes as OA;

#[OA\Schema(
    title: "Variables Data Transfer Object",
    description: "Schema for VariablesDto with properties required for the API."
)]
final readonly class VariablesDto
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
        #[OA\Property(
            description: 'Body Background color value',
            type: 'string'
        )]
        private null|string $bodyBg = '#FFFFFF',
        #[OA\Property(
            description: 'Primary color value',
            type: 'string'
        )]
        private null|string $primary = '#0d6efd',

        #[OA\Property(
            description: 'Secondary color value',
            type: 'string'
        )]
        private null|string $secondary = '#6c757d',
        #[OA\Property(
            description: 'Success color value',
            type: 'string'
        )]
        private null|string $success = '#198754',
        #[OA\Property(
            description: 'Info color value',
            type: 'string'
        )]
        private null|string $info = '#0dcaf0',
        #[OA\Property(
            description: 'Warning color value',
            type: 'string'
        )]
        private null|string $warning = '#ffc107',
        #[OA\Property(
            description: 'Danger color value',
            type: 'string'
        )]
        private null|string $danger = '#dc3545',
        #[OA\Property(
            description: 'Light color value',
            type: 'string'
        )]
        private null|string $light = '#f8f9fa',
        #[OA\Property(
            description: 'Dark color value',
            type: 'string'
        )]
        private null|string $dark = '#212529',
        #[OA\Property(
            description: 'List Group Background Color',
            type: 'string'
        )]
        private null|string $listGroupBg = '#333333',
        #[OA\Property(
            description: 'Border Radius',
            type: 'string'
        )]
        private null|string $borderRadius = "0.375rem",
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

    public function getBorderRadius(): ?string
    {
        return $this->borderRadius;
    }

}