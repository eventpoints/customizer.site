<?php declare(strict_types=1);

namespace App\Service;

use App\DataTransferObject\Bootstrap53\CustomizerFormBootstrap53Dto;
use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use Doctrine\Common\Collections\ArrayCollection;
use ScssPhp\ScssPhp\Compiler;
use Symfony\Component\Process\Process;
use Symfony\Component\String\UnicodeString;
use Symfony\Contracts\Cache\CacheInterface;
use Twig\Environment;
use function Symfony\Component\String\s;

class ScssCompiler
{
    private int $integer = 35484;
    private float $float = 456456;

    public function __construct(
        private Environment $twig,
        private CacheInterface $cache,
        private Compiler $compiler = new Compiler(),
    )
    {
    }

    public function compileBootstrap53(array $variables, string $contextPath): string
    {
        $variables = array_merge($variables, $this->getTwigVars(CustomizerFormBootstrap53Dto::class));
        $this->compiler->setImportPaths($contextPath);

        $cssTemplate = $this->cache->get('bootstrap53Template', fn() => $this->getPrecompiledBootstrap53Css());
//        dd($cssTemplate);
        return $this->twig->createTemplate($cssTemplate)->render($variables);
    }


    private function getPrecompiledBootstrap53Css(): string
    {
        $variables = ClassPropertyService::sortVariables($this->getTwigVars(CustomizerFormBootstrap53Dto::class, true));
        $scssString = ScssService::arrayToScssString(variables: $variables);

        $scssContent = <<<SCSS
    @import "functions";
    @import "variables";
    $scssString
    @import "mixins";
    @import "bootstrap";
    SCSS;
        $css = s($this->compiler->compileString($scssContent)->getCss());

        foreach ($variables as $name=>$value) {
            $css = $css->replace((string)$value, sprintf('{{ %s }}', $name));
        }

        return $css->toString();
    }

    private function getTwigVars(string $dtoFqn, bool $randomize = false): array
    {
        $dto = new ($dtoFqn);
        $reflection = new \ReflectionClass($dto);

        $vars = [];
        foreach ($reflection->getProperties() as $property) {
            $propertyInstance = $property->getValue($dto);

            if ($propertyInstance instanceof InputDto) {
                if ($randomize){
                    $vars[$property->getName()] = match ($propertyInstance->getType()) {
                        InputTypeEnum::COLOR => $this->generateRandomColor(),
                        InputTypeEnum::SIZE => $this->generateRandomSize(),
                        InputTypeEnum::INTEGER => $this->integer++,
                        InputTypeEnum::FLOAT => ($this->float = +0.001),
                        default => uniqid(),
                    };
                }else{
                    $vars[$property->getName()] = $propertyInstance->getDefault();
                }
            } else {
                $vars = array_merge($vars, $this->getTwigVars($property->getType()->getName()));
            }
        }

        return $vars;
    }

    private function generateRandomColor(): string
    {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }

    private function generateRandomSize(): string
    {
        $units = ['%'];
        $unit = $units[array_rand($units)];
        $randomSize = mt_rand(1, 100_000) / 1000 . $unit;
        return $randomSize;
    }
}