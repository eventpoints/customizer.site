<?php

namespace App\DataTransferObject;

class JwtTokenDto
{


    public function __construct(
        private string $email,
        private int    $exp,
        private string $iss,
        private array  $roles,
    )
    {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getExp(): int
    {
        return $this->exp;
    }

    public function getIss(): string
    {
        return $this->iss;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

}