<?php declare(strict_types=1);

namespace App\Controller\Api;

use App\DataTransferObject\VariablesDto;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[OA\Tag(name: 'VariablesDto')]
class VariablesDtoController extends AbstractController
{

    #[OA\Response(
        response: 200,
        description: 'Returns the json object with css',
        content: new OA\MediaType(mediaType: 'application/json', schema: new OA\Schema(ref: '#/components/schemas/VariablesDto'))
    )]
    #[Route(path: '/variables', name: 'get_variables_dto', methods: ['GET'])]
    public function __invoke(): JsonResponse
    {
        return $this->json(new VariablesDto());
    }

}