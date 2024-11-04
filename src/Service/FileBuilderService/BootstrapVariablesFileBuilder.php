<?php declare(strict_types=1);

namespace App\Service\FileBuilderService;

use App\DataTransferObject\RootDtoInterface;
use App\Service\ClassPropertyService;
use App\Service\ScssService;

class BootstrapVariablesFileBuilder implements FileBuilderInterface
{
    public function build(RootDtoInterface $dto): string
    {
        return ScssService::arrayToScssString(ClassPropertyService::getClassProperties(rootDto: $dto));
    }
}