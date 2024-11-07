<?php declare(strict_types=1);

namespace App\Service;

// src/Service/BootstrapCustomizer.php

namespace App\Service;

use Exception;
use Minify_CSSmin;
use Throwable;
use ScssPhp\ScssPhp\Compiler;
use ScssPhp\ScssPhp\Exception\CompilerException;
use ScssPhp\ScssPhp\Exception\SassException;
use ScssPhp\ScssPhp\Exception\SassScriptException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

class BootstrapCompilerService
{
    private readonly Compiler $compiler;

    public function __construct()
    {
        $this->compiler = new Compiler();
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

        $this->compiler->setImportPaths(__DIR__ . '/../../node_modules/bootstrap/scss/');
        $css = $this->compiler->compileString($scssContent)->getCss();

        if ($isMinified) {
            return Minify_CSSmin::minify($css);
        }

        return $css;
    }

}