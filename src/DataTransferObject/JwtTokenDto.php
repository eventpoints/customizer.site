<?php declare(strict_types=1);

namespace App\DataTransferObject;

class JwtTokenDto
{
    public function __construct(
        private readonly string $email,
        private readonly int    $exp,
        private readonly string $iss,
        /**
         * @var array<string>
         */
        private readonly array  $roles,
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

    /**
     * @return string[]
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

}