<?php declare(strict_types=1);

namespace App\Controller\Controller;

use App\Service\AuthorizationService;
use App\Service\StripePaymentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PaymentController extends AbstractController
{

    public function __construct(
        private readonly AuthorizationService $authorizationService,
        private readonly StripePaymentService $stripePaymentService
    )
    {
    }

    #[Route(path: '/payment/{token}', name: 'create_payment')]
    public function payment(string $token): Response
    {
        $isValid = $this->authorizationService->isTokenValid($token);
        if (!$isValid) {
            return $this->redirectToRoute('landing');
        }

        if($this->stripePaymentService->hasActiveSubscription(token: $token)){
            return $this->redirectToRoute('user_dashboard');
        }

        return $this->render('payment/create.html.twig');
    }
}