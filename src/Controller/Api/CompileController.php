<?php

namespace App\Controller\Api;

use App\DataTransferObject\VariablesDto;
use App\Service\BootstrapCompilerService;
use App\Service\ClassPropertyService;
use OpenApi\Attributes as OA;
use ReflectionClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[OA\Tag(name: 'Compile')]
class CompileController extends AbstractController
{
    public function __construct(
        private readonly BootstrapCompilerService $bootstrapCompilerService
    )
    {
    }

    /**
     * @throws \ReflectionException
     */
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
    public function compileCss(#[MapRequestPayload] VariablesDto $variablesDto): JsonResponse
    {
        $variables = ClassPropertyService::getClassProperties(variablesDto: $variablesDto);
        $css = $this->bootstrapCompilerService->compileCustomBootstrap(variables: $variables);
        return new JsonResponse(['css' => $css]);
    }

}