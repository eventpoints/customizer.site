<?php

namespace App\Controller\ApiController;

use App\DataTransferObject\VariablesDto;
use App\Enumerators\DownloadTypeEnum;
use Nelmio\ApiDocBundle\Attribute\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

class DownloadController extends AbstractController
{

    #[OA\Parameter(
        parameter: 'identifier',
        name: 'identifier',
        description: 'The field used to set the desired file. Options: ["bootstrap", "bootstrapMin", "variables"]',
        in: 'path',
        schema: new OA\Schema(type: 'string')
    )]
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
        description: 'Returns the file based on identifier',
        content: new OA\MediaType(mediaType: 'text/css|text/x-scss')
    )]
    #[Route("/download/{identifier}", name: "download", methods: ["POST"])]
    public function download(DownloadTypeEnum $identifier, #[MapRequestPayload] VariablesDto $variablesDto): Response
    {
        dd($identifier, $variablesDto);
    }
}