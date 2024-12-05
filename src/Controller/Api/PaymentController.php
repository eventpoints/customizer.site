<?php

namespace App\Controller\Api;

use App\DataTransferObject\Bootstrap53\CustomizerFormBootstrap53Dto;
use App\DataTransferObject\PaymentAmountDto;
use App\DataTransferObject\SubscriptionDataDto;
use App\Entity\User;
use App\Service\AuthorizationService;
use App\Service\StripePaymentService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;

#[Route(path: '/payment')]
class PaymentController extends AbstractController
{

    public function __construct(
        private readonly StripePaymentService $stripePaymentService,
        private readonly AuthorizationService $authorizationService
    )
    {
    }

    #[OA\Response(
        response: 200,
        description: 'Returns the stripe subscription object',
    )]
    #[Route(path: '/subscription', name: 'pay_subscription')]
    public function pay(Request $request): JsonResponse
    {

        $content = json_decode($request->getContent());

        $csrfToken = $request->headers->get('X-CSRF-Token');
        if (!$this->isCsrfTokenValid('payment_token', $csrfToken)) {
            return new JsonResponse(['error' => 'Invalid CSRF token'], Response::HTTP_FORBIDDEN);
        }

        if (!$this->authorizationService->isTokenValid(token: $content->token)) {
            return new JsonResponse(['error' => 'token invalid'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $subscriptionDataDto = $this->stripePaymentService->createEnterpriseSubscription(token: $content->token);
        return new JsonResponse([
            'amount' => $subscriptionDataDto->getAmount(),
            'clientSecret' => $subscriptionDataDto->getClientSecret(),
            'interval' => $subscriptionDataDto->getInterval(),
        ]);
    }

    #[Route(path: '/cancel', name: 'cancel_subscription')]
    public function cancel(): JsonResponse
    {

    }

}