<?php declare(strict_types=1);

namespace App\Service\FileBuilderService;

use App\DataTransferObject\VariablesDto;
use App\Service\ClassPropertyService;
use App\Service\ScssService;

class BootstrapVariablesFileBuilder implements FileBuilderInterface
{
    public function build(VariablesDto $variablesDto): string
    {
        return ScssService::arrayToScssString(ClassPropertyService::getClassProperties(variablesDto: $variablesDto));
    }
}