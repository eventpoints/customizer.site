<?php

namespace App\Controller\Controller;

use App\DataTransferObject\VariablesDto;
use App\Form\Form\BootstrapGeneratorFormType;
use App\Service\BootstrapCustomizer;
use Carbon\CarbonImmutable;
use ScssPhp\ScssPhp\Compiler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class AppController extends AbstractController
{


    public function __construct(
        private readonly BootstrapCustomizer $bootstrapCustomizer
    )
    {
    }

    #[Route(path: '/', name: 'landing')]
    public function landing(Request $request): Response
    {
        $variablesDto = new VariablesDto();
        $bootstrapGeneratorForm = $this->createForm(type: BootstrapGeneratorFormType::class, data: $variablesDto);

        $bootstrapGeneratorForm->handleRequest($request);
        if ($bootstrapGeneratorForm->isSubmitted() && $bootstrapGeneratorForm->isValid()) {
            $css = $this->bootstrapCustomizer->compileCustomBootstrap(variablesDto: $variablesDto);
            dd($css);
        }

        return $this->render('app/landing.html.twig', [
            'bootstrapGeneratorForm' => $bootstrapGeneratorForm,
            'variablesDto' => $variablesDto
        ]);
    }
}