<?php

namespace App\DataTransferObject;

class VariablesDto
{
    private null|string $primary;
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