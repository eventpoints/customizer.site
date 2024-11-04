<?php declare(strict_types=1);

namespace App\Controller\Api;

use App\DataTransferObject\Bootstrap53\ColorsDto;
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
        description: 'Returns the available colors',
        content: new OA\JsonContent(
            ref: '#/components/schemas/ColorsDto'
        )
    )]
    #[Route(path: '/bootstrap53/colors')]
    public function colors(): JsonResponse
    {
        return $this->json(new ColorsDto());
    }
}