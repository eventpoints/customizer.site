<?php declare(strict_types=1);

namespace App\Controller\Api;

use App\DataTransferObject\VariablesDto;
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
        return new Response(
            content: $this->findBuilder($identifier)->build($variablesDto),
            headers: [
                'Content-Type' => $identifier->getType()->getMimeType(),
                'Content-Disposition' => 'attachment; filename="' . $identifier->getType()->getFileName() . '"'
            ]
        );
    }

    private function findBuilder(DownloadTypeEnum $identifier): ?FileBuilderInterface
    {
        return (new ArrayCollection(iterator_to_array($this->fileBuilders)))->findFirst(
            fn(int $key, FileBuilderInterface $fileBuilder):bool => $fileBuilder instanceof ($identifier->getType()->getBuilderFqn())
        );
    }
}