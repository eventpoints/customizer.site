<?php

declare(strict_types=1);

namespace App\Service;

use App\DataTransferObject\PaymentAmountDto;
use App\DataTransferObject\StripePaymentIntentDto;
use App\DataTransferObject\SubscriptionDataDto;
use Stripe\StripeClient;
use Stripe\Subscription;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

final readonly class StripePaymentService
{

    public function __construct(
        private ParameterBagInterface $parameterBag,
        private AuthorizationService  $authorizationService,
    )
    {
    }

    public function createPaymentIntent(PaymentAmountDto $paymentAmountDto): StripePaymentIntentDto
    {
        $stripe = new StripeClient($this->parameterBag->get('app.stripe_private_key'));
        $paymentIntent = $stripe->paymentIntents->create([
            'amount' => $paymentAmountDto->getAmount(),
            'currency' => $paymentAmountDto->getCurrency(),
            'automatic_payment_methods' => ['enabled' => true],
        ]);

        return new StripePaymentIntentDto(
            clientSecret: $paymentIntent->client_secret,
            paymentIntentId: $paymentIntent->id
        );
    }

    public function hasActiveSubscription(string $token): bool
    {
        $stripe = new StripeClient($this->parameterBag->get('stripe_private_key'));
        $jwtTokenDto = $this->authorizationService->getJwtTokenDto(token: $token);

        // Search for a customer by email
        $customers = $stripe->customers->all(['email' => $jwtTokenDto->getEmail()]);

        if (empty($customers->data)) {
            return false;
        }

        // Check if any of the retrieved customers have active subscriptions
        foreach ($customers->data as $customer) {
            $subscriptions = $stripe->subscriptions->all(['customer' => $customer->id, 'status' => 'active']);
            if (!empty($subscriptions->data)) {
                return true; // Found an active subscription
            }
        }

        return false; // No active subscriptions found
    }


    public function createEnterpriseSubscription(string $token): SubscriptionDataDto
    {
        $stripe = new StripeClient($this->parameterBag->get('stripe_private_key'));
        $price = $stripe->prices->retrieve('price_1QSbn3AZabfUSbSaODLu9LSI');
        $jwtTokenDto = $this->authorizationService->getJwtTokenDto(token: $token);

        // Check if the customer already exists
        $customers = $stripe->customers->all(['email' => $jwtTokenDto->getEmail()]);
        $customer = $customers->data[0] ?? $stripe->customers->create([
            'email' => $jwtTokenDto->getEmail(),
            'description' => 'Enterprise customer',
        ]);

        // Create a subscription
        $subscription = $stripe->subscriptions->create([
            'customer' => $customer->id,
            'items' => [['price' => $price->id]],
            'payment_behavior' => 'default_incomplete', // Ensures payment is not immediately attempted
            'expand' => ['latest_invoice.payment_intent'], // Get the PaymentIntent for the Payment Element
        ]);

        return new SubscriptionDataDto(
            amount: $price->unit_amount,
            clientSecret: $subscription->latest_invoice->payment_intent->client_secret,
            /**@phpstan-ignore-next-line **/
            interval: $price->recurring->interval
        );
    }


}
