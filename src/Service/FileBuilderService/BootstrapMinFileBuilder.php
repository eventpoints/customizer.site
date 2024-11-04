<?php declare(strict_types=1);

namespace App\Service\FileBuilderService;

use App\DataTransferObject\RootDtoInterface;
use App\Service\BootstrapCompilerService;
use App\Service\ClassPropertyService;

class BootstrapMinFileBuilder implements FileBuilderInterface
{
    public function __construct(
        private readonly BootstrapCompilerService $bootstrapCompilerService,
    )
    {
    }

    public function build(RootDtoInterface $dto): string
    {
        $variables = ClassPropertyService::getClassProperties(rootDto: $dto);
        return $this->bootstrapCompilerService->compileCustomBootstrap($variables, true);
    }
}