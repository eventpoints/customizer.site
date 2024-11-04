<?php declare(strict_types=1);

namespace App\Controller\Api;

use App\DataTransferObject\Bootstrap53\Bootstrap53Dto;
use App\Service\SchemaExtractor;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[OA\Tag(name: 'VariablesDto')]
#[Route(path: '/variables', methods: ['GET'])]
class VariablesDtoController extends AbstractController
{
    #[OA\Response(
        response: 200,
        description: 'Returns the available input types',
    )]
    #[Route(path: '/bootstrap53')]
    public function bootstrap53(SchemaExtractor $schemaExtractor): JsonResponse
    {
        return $this->json($schemaExtractor->render(new Bootstrap53Dto()));
    }
}