<?php

namespace App\Controller\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

#[Route(path: '/users')]
class UserController extends AbstractController
{
    #[Route(path: '/dashboard', name: 'user_dashboard')]
    public function dashboard(#[CurrentUser] User $user): Response
    {
        return $this->render('user/dashboard.html.twig');
    }

}