<?php

namespace App\Controller\Controller;

use App\DataTransferObject\VariablesDto;
use App\Form\Form\BootstrapGeneratorFormType;
use App\Service\BootstrapCustomizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

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