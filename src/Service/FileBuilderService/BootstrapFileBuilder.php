<?php declare(strict_types=1);

namespace App\Service\FileBuilderService;

use App\DataTransferObject\VariablesDto;
use App\Service\BootstrapCompilerService;
use App\Service\ClassPropertyService;

class BootstrapFileBuilder implements FileBuilderInterface
{
    public function __construct(
        private readonly BootstrapCompilerService $bootstrapCompilerService,
    )
    {
    }

    public function build(VariablesDto $variablesDto): string
    {
        $variables = ClassPropertyService::getClassProperties(variablesDto: $variablesDto);
        return $this->bootstrapCompilerService->compileCustomBootstrap($variables, false);
    }
}