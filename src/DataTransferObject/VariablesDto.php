<?php

namespace App\DataTransferObject;

use OpenApi\Attributes as OA;

#[OA\Schema(
    title: "Variables Data Transfer Object",
    description: "Schema for VariablesDto with properties required for the API."
)]
class VariablesDto
{
    #[OA\Property(
        description: 'Primary color value',
        type: 'string'
    )]
    private null|string $primary;
    #[OA\Property(
        description: 'Secondary color value',
        type: 'string'
    )]
    private null|string $secondary;

    /**
     * @param string|null $primary
     * @param string|null $secondary
     */
    public function __construct(?string $primary = '#667EEA', ?string $secondary = '#6330C9')
    {
        $this->primary = $primary;
        $this->secondary = $secondary;
    }

    public function getPrimary(): ?string
    {
        return $this->primary;
    }

    public function setPrimary(?string $primary): void
    {
        $this->primary = $primary;
    }

    public function getSecondary(): ?string
    {
        return $this->secondary;
    }

    public function setSecondary(?string $secondary): void
    {
        $this->secondary = $secondary;
    }

}