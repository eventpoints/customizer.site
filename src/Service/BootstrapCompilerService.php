<?php declare(strict_types=1);

namespace App\Service;

// src/Service/BootstrapCustomizer.php

namespace App\Service;

use Minify_CSSmin;
use Throwable;
use ScssPhp\ScssPhp\Compiler;

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
    @import "variables";
    $scssString
    @import "maps";
    @import "mixins";
    @import "root";
    SCSS;

        $tempFilePath = sys_get_temp_dir() . '/custom_' . uniqid() . '.scss';
        file_put_contents($tempFilePath, $scssContent);

        try {
            $this->compiler->setImportPaths(__DIR__ . '/../../node_modules/bootstrap/scss/');
            $css = $this->compiler->compileFile($tempFilePath)->getCss();
        } finally {
            unlink($tempFilePath);
        }

        if ($isMinified) {
            return Minify_CSSmin::minify($css);
        }

        return $css;
    }
}