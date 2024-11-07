<?php declare(strict_types=1);

namespace App\Controller\Api;

use App\DataTransferObject\Bootstrap53\CustomizerFormBootstrap53Dto;
use App\Enumerators\DownloadTypeEnum;
use App\Service\FileBuilderService\FileBuilderInterface;
use Doctrine\Common\Collections\ArrayCollection;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\AutowireIterator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[OA\Tag(name: 'Download')]
#[Route("/download", methods: ["POST"])]
class DownloadController extends AbstractController
{
    /**
     * @param iterable<int, FileBuilderInterface> $fileBuilders
     */
    public function __construct(
        #[AutowireIterator('app.service.fileBuilderService')]
        private readonly iterable $fileBuilders
    )
    {
    }

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
        content: new OA\JsonContent(ref: '#/components/schemas/CustomizerFormBootstrap53Dto')
    )]
    #[OA\Response(
        response: 200,
        description: 'Returns the file based on identifier',
        content: new OA\MediaType(mediaType: 'text/css|text/x-scss')
    )]
    #[Route("/bootstrap53/{identifier}")]
    public function bootstrap53(DownloadTypeEnum $identifier, #[MapRequestPayload(serializationContext: ['groups' => ['compile']])] CustomizerFormBootstrap53Dto $bootstrap53Dto): Response
    {
        return new Response(
            content: $this->findBuilder($identifier)->build($bootstrap53Dto),
            headers: [
                'Content-Type' => $identifier->getType()->getMimeType(),
                'Content-Disposition' => 'attachment; filename="' . rawurlencode($identifier->getType()->getFileName()) . '"',
            ]
        );
    }

    private function findBuilder(DownloadTypeEnum $identifier): ?FileBuilderInterface
    {
        return (new ArrayCollection(iterator_to_array($this->fileBuilders)))->findFirst(
            fn(int $key, FileBuilderInterface $fileBuilder): bool => $fileBuilder instanceof ($identifier->getType()->getBuilderFqn())
        );
    }
}