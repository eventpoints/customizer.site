<?php

namespace App\DataTransferObject;

class SubscriptionDataDto
{


    public function __construct(
        private int    $amount,
        private string $clientSecret,
        private string $interval,
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