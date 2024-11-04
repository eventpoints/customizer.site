<?php declare(strict_types=1);

namespace App\Service;

// src/Service/BootstrapCustomizer.php

namespace App\Service;

use CssMin;
use Exception;
use Psr\Log\LoggerInterface;
use ScssPhp\ScssPhp\Compiler;

class BootstrapCompilerService
{

    public function __construct(
        private readonly LoggerInterface $logger
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
    public function compileCustomBootstrap(array $variables, bool $isMinified = false): null|string
    {
        $scssString = ScssService::arrayToScssString(variables: $variables);

        $scssContent = <<<SCSS
    $scssString
    @import "functions";
    @import "variables";
    @import "mixins";
    @import "bootstrap";
    SCSS;

        $compiler = new Compiler();
        $compiler->setImportPaths(__DIR__ . '/../../node_modules/bootstrap/scss/');

        try {
            $css = $compiler->compileString($scssContent)->getCss();
            if ($isMinified) {
                return CssMin::minify($css);
            }

            return $css;
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
        }

        return null;
    }

}