<?php declare(strict_types=1);

namespace App\Service\FileBuilderService;

use App\DataTransferObject\VariablesDto;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('app.service.fileBuilderService')]
interface FileBuilderInterface
{
    public function build(VariablesDto $variablesDto):string;
}