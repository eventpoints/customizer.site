<?php

namespace App\Controller\Api;

use App\Service\BootstrapCompilerService;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[OA\Tag(name: 'Compile')]
class CompileController extends AbstractController
{
    public function __construct(
        private readonly BootstrapCompilerService $bootstrapCompilerService
    )
    {
    }

    #[OA\RequestBody(
        description: 'JSON body containing variables required for the operation.',
        required: true,
        content: new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(ref: '#/components/schemas/VariablesDto')
        )
    )]
    #[OA\Response(
        response: 200,
        description: 'Returns the json object with css',
        content: new OA\MediaType(mediaType: 'application/json')
    )]
    #[Route(path: '/compile', name: 'compile_css', methods: ['POST'])]
    public function compileCss(Request $request): JsonResponse
    {
        $variables = json_decode($request->getContent(), true)['variables'];
        $css = $this->bootstrapCompilerService->compileCustomBootstrap(variables: $variables);
        return new JsonResponse(['css' => $css]);
    }

}