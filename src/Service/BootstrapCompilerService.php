<?php declare(strict_types=1);

namespace App\Service;

// src/Service/BootstrapCustomizer.php

namespace App\Service;

use Exception;
use Minify_CSSmin;
use ScssPhp\ScssPhp\Compiler;
use ScssPhp\ScssPhp\Exception\CompilerException;
use ScssPhp\ScssPhp\Exception\SassException;
use ScssPhp\ScssPhp\Exception\SassScriptException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

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

        $compiler = new Compiler();
        $compiler->setImportPaths(__DIR__ . '/../../node_modules/bootstrap/scss/');

        try {
            $css = $compiler->compileString($scssContent)->getCss();
        } catch (Throwable $exception) {
            return $exception;
        }

        if ($isMinified) {
            return Minify_CSSmin::minify($css);
        }

        return $css;
    }

}