<?php

namespace App\Service\FileBuilderService;

use App\DataTransferObject\VariablesDto;
use App\Service\BootstrapCompilerService;
use App\Service\ClassPropertyService;

class BootstrapMinFileBuilder implements FileBuilderInterface
{
    public function __construct(
        private readonly BootstrapCompilerService $bootstrapCompilerService,
    )
    {
    }

    public function build(VariablesDto $variablesDto): string
    {
        $variables = ClassPropertyService::getClassProperties(variablesDto: $variablesDto);
        return $this->bootstrapCompilerService->compileCustomBootstrap($variables, true);
    }
}