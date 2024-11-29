<?php declare(strict_types=1);

namespace App\Controller\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AppController extends AbstractController
{
    #[Route(path: '/app', name: 'app')]
    public function app(): Response
    {
        return $this->render('app/app.html.twig');
    }

    #[Route(path: '/', name: 'landing')]
    public function landing(): Response
    {
        return $this->render('app/landing.html.twig');
    }
}