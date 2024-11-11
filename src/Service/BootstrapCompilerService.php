<?php declare(strict_types=1);

namespace App\Service;

// src/Service/BootstrapCustomizer.php

namespace App\Service;

use Minify_CSSmin;
use Throwable;

class BootstrapCompilerService
{
    public function __construct(
        private readonly ScssCompiler $compiler
    )
    {
    }

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
    public function compileCustomBootstrap(array $variables, bool $isMinified = false): Throwable|string
    {
        $scssString = ScssService::arrayToScssString(variables: $variables);

        $scssContent = <<<SCSS
    @import "functions";
    $scssString
    @import "variables";
    @import "mixins";
    @import "bootstrap";
    SCSS;

        try {
            $css = $this->compiler->compileScss($scssContent, __DIR__ . '/../../node_modules/bootstrap/scss/');
        } catch (Throwable $exception) {
            return $exception;
        }

        if ($isMinified) {
            return Minify_CSSmin::minify($css);
        }

        return $css;
    }

}