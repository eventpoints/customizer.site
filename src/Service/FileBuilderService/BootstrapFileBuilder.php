<?php

namespace App\Service\FileBuilderService;

use App\DataTransferObject\VariablesDto;
use App\Service\BootstrapCustomizer;

class BootstrapFileBuilder implements FileBuilderInterface
{
    public function __construct(
        private BootstrapCustomizer $bootstrapCustomizer,
    )
    {
    }

    public function build(VariablesDto $variablesDto): string
    {
        return $this->bootstrapCustomizer->compileCustomBootstrap($variablesDto);
    }
}