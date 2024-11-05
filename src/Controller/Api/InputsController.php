<?php declare(strict_types=1);

namespace App\Controller\Api;

use App\DataTransferObject\Bootstrap53\CustomizerFormBootstrap53Dto;
use App\Service\SchemaExtractor;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[OA\Tag(name: 'Inputs Description')]
#[Route(path: '/inputs', methods: ['GET'])]
class InputsController extends AbstractController
{
    #[OA\Response(
        response: 200,
        description: 'Returns the available input types',
    )]
    #[Route(path: '/bootstrap53')]
    public function bootstrap53(): JsonResponse
    {
        return $this->json(
            data: new CustomizerFormBootstrap53Dto(),
            context: ['groups' => 'form']
        );
    }
}