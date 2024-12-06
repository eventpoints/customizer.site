<?php declare(strict_types=1);

namespace App\DataTransferObject;

class SubscriptionDataDto
{


    public function __construct(
        private readonly int    $amount,
        private readonly string $clientSecret,
        private readonly string $interval,
    )
    {
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    public function getInterval(): string
    {
        return $this->interval;
    }

}