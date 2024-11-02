<?php

namespace App\Controller\Api;

use App\Service\BootstrapCompilerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/api')]
class CompileController extends AbstractController
{
    public function __construct(
        private readonly BootstrapCompilerService $bootstrapCompilerService
    )
    {
    }

    #[Route(path: '/compile', name: 'compile_css')]
    public function compileCss(Request $request): JsonResponse
    {
        $variables = json_decode($request->getContent(), true)['variables'];
        $css = $this->bootstrapCompilerService->compileCustomBootstrap(variables: $variables);
        return new JsonResponse(['css' => $css]);
    }

}