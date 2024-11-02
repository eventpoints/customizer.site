<?php

namespace App\Service\FileBuilderService;

use App\DataTransferObject\VariablesDto;
use App\Service\BootstrapCompilerService;

class BootstrapVariablesFileBuilder implements FileBuilderInterface
{
    public function __construct(
        private readonly BootstrapCompilerService $bootstrapCompilerService,
    )
    {
    }

    public function build(VariablesDto $variablesDto): string
    {
        return $this->bootstrapCompilerService->compileCustomBootstrap($variablesDto, false);
    }
}