<?php

declare(strict_types=1);

namespace App\DataTransferObject;

final readonly class StripePaymentIntentDto
{

    /**
     * @param string $clientSecret
     * @param string $paymentIntentId
     */
    public function __construct(private string $clientSecret, private string $paymentIntentId)
    {
    }

    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    public function getPaymentIntentId(): string
    {
        return $this->paymentIntentId;
    }

}
