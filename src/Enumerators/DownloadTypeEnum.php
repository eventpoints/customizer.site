<?php

namespace App\Enumerators;

use App\DataTransferObject\DownloadTypeDto;
use App\Service\FileBuilderService\BootstrapFileBuilder;
use App\Service\FileBuilderService\BootstrapMinFileBuilder;
use App\Service\FileBuilderService\BootstrapVariablesFileBuilder;

enum DownloadTypeEnum: string
{
    case BOOTSTRAP = 'bootstrap';
    case BOOTSTRAP_MIN = 'bootstrapMin';
    case VARIABLES = 'variables';

    public function getType(): DownloadTypeDto
    {
        return match($this) {
            DownloadTypeEnum::BOOTSTRAP => new DownloadTypeDto(builderFqn: BootstrapFileBuilder::class,fileName:  'bootstrap.css', mimeType: 'text/css'),
            DownloadTypeEnum::BOOTSTRAP_MIN => new DownloadTypeDto(builderFqn: BootstrapMinFileBuilder::class,fileName:  'bootstrap.min.css', mimeType: 'text/css'),
            DownloadTypeEnum::VARIABLES => new DownloadTypeDto(builderFqn: BootstrapVariablesFileBuilder::class,fileName:  '_variables.scss', mimeType: 'text/css'),
        };
    }
}
