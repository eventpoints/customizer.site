<?php declare(strict_types=1);

namespace App\Controller\Api;

use App\DataTransferObject\Bootstrap53\CustomizerFormBootstrap53Dto;
use App\Service\BootstrapCompilerService;
use App\Service\ClassPropertyService;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Cache\CacheInterface;
use Throwable;

#[OA\Tag(name: 'Compile')]
#[Route(path: '/compile', methods: ['POST'])]
class CompileController extends AbstractController
{
    public function __construct(
        private readonly BootstrapCompilerService $bootstrapCompilerService,
        private readonly CacheInterface $cache,
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
            schema: new OA\Schema(ref: '#/components/schemas/CustomizerFormBootstrap53Dto')
        )
    )]
    #[OA\Response(
        response: 200,
        description: 'Returns the json object with css',
        content: new OA\MediaType(mediaType: 'application/json')
    )]
    #[Route(path: '/bootstrap53')]
    public function compileBootstrap53(#[MapRequestPayload(serializationContext: ['groups' => ['compile']])] CustomizerFormBootstrap53Dto $bootstrap53Dto, #[MapQueryParameter] bool $isCached = false): JsonResponse
    {
        $variables = ClassPropertyService::getClassProperties(rootDto: $bootstrap53Dto);

        if ($isCached) {
            return $this->cache->get(sprintf('compiledBootstrap-%s', crc32(serialize($variables))), fn(): \Symfony\Component\HttpFoundation\JsonResponse => $this->getCss($variables));
        }

        return $this->getCss($variables);
    }

    /**
     * @param array<string, string> $variables
     */
    private function getCss(array $variables):JsonResponse
    {
        $css = $this->bootstrapCompilerService->compileCustomBootstrap(variables: $variables);

        if ($css instanceof Throwable) {
            return new JsonResponse(data: [
                'message' => $css->getMessage(),
            ], status: 500);
        }
        return new JsonResponse(data: $css);
    }
}