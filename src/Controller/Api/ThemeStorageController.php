<?php declare(strict_types=1);

namespace App\Controller\Api;

use App\DataTransferObject\Bootstrap53\CustomizerFormBootstrap53Dto;
use App\Entity\Theme;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[OA\Tag(name: 'Theme Storage')]
#[Route("/themes")]
#[IsGranted('IS_AUTHENTICATED_FULLY')]
class ThemeStorageController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $em
    )
    {
    }

    #[OA\Parameter(
        parameter: 'title',
        name: 'title',
        description: 'Title of the theme',
        in: 'path',
        schema: new OA\Schema(type: 'string')
    )]
    #[OA\RequestBody(
        description: 'JSON body containing variables required for the operation.',
        required: true,
        content: new OA\JsonContent(ref: '#/components/schemas/CustomizerFormBootstrap53Dto')
    )]
    #[OA\Response(
        response: 201,
        description: 'Returns stored variables json',
    )]
    #[OA\Post(security: [['BearerAuth' => []]])]
    #[Route("/{title}", methods: ['POST'])]
    public function post(
        string                                                                                             $title,
        #[MapRequestPayload(serializationContext: ['groups' => ['compile']])] CustomizerFormBootstrap53Dto $bootstrap53Dto,
        #[CurrentUser] User                                                                                $user
    ): Response
    {
        $theme = new Theme(name: $title, dto: $bootstrap53Dto);

        $this->em->persist($user->addTheme($theme));
        $this->em->flush();
        return $this->json($theme, Response::HTTP_CREATED);
    }

    #[OA\Response(
        response: 200,
        description: 'Returns list of themes',
    )]
    #[OA\Get(security: [['BearerAuth' => []]])]
    #[Route("", methods: ['GET'])]
    public function getAll(#[CurrentUser] User $user): Response
    {
        return $this->json($user->getThemes());
    }

    #[OA\Parameter(
        parameter: 'id',
        name: 'id',
        description: 'Id of the theme',
        in: 'path',
        schema: new OA\Schema(type: 'string')
    )]
    #[OA\Response(
        response: 200,
        description: 'Returns stored variables json',
    )]
    #[OA\Get(security: [['BearerAuth' => []]])]
    #[Route("/{id}", methods: ['GET'])]
    public function get(Theme $theme): Response
    {
        return $this->json($theme);
    }

    #[OA\Parameter(
        parameter: 'id',
        name: 'id',
        description: 'Id of the theme',
        in: 'path',
        schema: new OA\Schema(type: 'string')
    )]
    #[OA\RequestBody(
        description: 'JSON body containing variables required for the operation.',
        required: true,
        content: new OA\JsonContent(ref: '#/components/schemas/CustomizerFormBootstrap53Dto')
    )]
    #[OA\Response(
        response: 202,
        description: 'Returns updated variables json',
    )]
    #[OA\Patch(security: [['BearerAuth' => []]])]
    #[Route("/{id}", methods: ['PATCH'])]
    public function patch(Theme $theme, #[MapRequestPayload(serializationContext: ['groups' => ['compile']])] CustomizerFormBootstrap53Dto $bootstrap53Dto): Response
    {
        $this->em->persist($theme->setDto($bootstrap53Dto));
        $this->em->flush();
        return $this->json($theme, Response::HTTP_ACCEPTED);
    }

    #[OA\Parameter(
        parameter: 'id',
        name: 'id',
        description: 'Id of the theme',
        in: 'path',
        schema: new OA\Schema(type: 'string')
    )]
    #[OA\Delete(security: [['BearerAuth' => []]])]
    #[Route("/{id}", methods: ['DELETE'])]
    public function delete(Theme $theme): Response
    {
        $this->em->remove($theme);
        $this->em->flush();
        return $this->json(null, Response::HTTP_ACCEPTED);
    }
}