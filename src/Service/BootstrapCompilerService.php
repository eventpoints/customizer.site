<?php declare(strict_types=1);

namespace App\Service;

// src/Service/BootstrapCustomizer.php

namespace App\Service;

use Minify_CSSmin;
use ScssPhp\ScssPhp\Compiler;
use Throwable;

class BootstrapCompilerService
{
    public function __construct(
        private ScssCompiler $scssCompiler,
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
//        $scssString = ScssService::arrayToScssString(variables: $variables);
//
//        $scssContent = <<<SCSS
//    @import "functions";
//    $scssString
//    @import "variables";
//    @import "mixins";
//    @import "bootstrap";
//    SCSS;

//        $compiler = new Compiler();
//        $compiler->setImportPaths(__DIR__ . '/../../node_modules/bootstrap/scss/');
        return $this->scssCompiler->compileBootstrap53($variables, __DIR__ . '/../../node_modules/bootstrap/scss/');
//        try {
//            $css = $compiler->compileString($scssContent)->getCss();
//        } catch (Throwable $exception) {
//            return $exception;
//        }
//
//        if ($isMinified) {
//            return Minify_CSSmin::minify($css);
//        }
//
//        return $css;
    }

}