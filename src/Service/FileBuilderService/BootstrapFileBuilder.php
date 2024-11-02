<?php

namespace App\Service\FileBuilderService;

use App\DataTransferObject\VariablesDto;
use App\Service\BootstrapCompilerService;

class BootstrapFileBuilder implements FileBuilderInterface
{
    public function __construct(
        private BootstrapCompilerService $bootstrapCompilerService,
    )
    {
    }

    public function build(VariablesDto $variablesDto): string
    {
        return $this->bootstrapCompilerService->compileCustomBootstrap($variablesDto, false);
    }
}