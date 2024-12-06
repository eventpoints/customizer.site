<?php

declare(strict_types=1);

namespace App\DataTransferObject;

final readonly class PaymentAmountDto
{
    /**
     * @param int $amount
     * @param string $currency
     */
    public function __construct(private int $amount, private string $currency)
    {
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

}
