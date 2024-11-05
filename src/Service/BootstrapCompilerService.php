<?php declare(strict_types=1);

namespace App\Service;

// src/Service/BootstrapCustomizer.php

namespace App\Service;

use CssMin;
use ScssPhp\ScssPhp\Compiler;

class BootstrapCompilerService
{
    /**
     * @param array<string, string> $variables
     * @return string
     */
    public function getCustomVariable(array $variables): string
    {
        return ScssService::arrayToScssString($variables);
    }

    /**
     * @param array<string, string> $variables
     * @return string
     */
    public function compileCustomBootstrap(array $variables, bool $isMinified = false): string
    {
        $scssString = ScssService::arrayToScssString(variables: $variables);

        $scssContent = <<<SCSS
    @import "functions";
    @import "variables";
    $scssString
    @import "mixins";
    @import "bootstrap";
    SCSS;

        $compiler = new Compiler();
        $compiler->setImportPaths(__DIR__ . '/../../node_modules/bootstrap/scss/');

        $css = $compiler->compileString($scssContent)->getCss();
        if ($isMinified) {
            return CssMin::minify($css);
        }

        return $css;
    }

}