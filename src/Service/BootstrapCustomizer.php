<?php

namespace App\Service;

// src/Service/BootstrapCustomizer.php

namespace App\Service;

use App\DataTransferObject\VariablesDto;
use ScssPhp\ScssPhp\Compiler;

class BootstrapCustomizer
{
    private Compiler $scssCompiler;

    public function __construct()
    {
        $this->scssCompiler = new Compiler();
        $this->scssCompiler->addImportPath(path: __DIR__.'/../../node_modules/bootstrap/scss/bootstrap.scss');
    }

    public function compileCustomBootstrap(VariablesDto $variablesDto): string
    {
        $this->scssCompiler->addVariables([
            'primary' => $variablesDto->getPrimary() ?? '#00796b',
            'secondary' => $variablesDto->getSecondary() ?? '#dee2e6',
        ]);

        $bootstrapPath = __DIR__ . '/../../node_modules/bootstrap/scss/bootstrap.scss';
        return $this->scssCompiler->compileString("@import '{$bootstrapPath}';")->getCss();
    }

}