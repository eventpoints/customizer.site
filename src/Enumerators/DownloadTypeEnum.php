<?php

namespace App\Enumerators;

use App\Service\FileBuilderService\BootstrapFileBuilder;
use App\Service\FileBuilderService\BootstrapMinFileBuilder;
use App\Service\FileBuilderService\BootstrapVariablesFileBuilder;
use App\Service\FileBuilderService\FileBuilderInterface;

enum DownloadTypeEnum: string
{
    case BOOTSTRAP = 'bootstrap';
    case BOOTSTRAP_MIN = 'bootstrapMin';
    case VARIABLES = 'variables';

    /**
     * @return class-string<FileBuilderInterface>
     */
    public function getBuilder(): string
    {
        return match($this) {
            DownloadTypeEnum::BOOTSTRAP => BootstrapFileBuilder::class,
            DownloadTypeEnum::BOOTSTRAP_MIN => BootstrapMinFileBuilder::class,
            DownloadTypeEnum::VARIABLES => BootstrapVariablesFileBuilder::class,
        };
    }

    public function getFileName(): string
    {
        return match($this) {
            DownloadTypeEnum::BOOTSTRAP => 'bootstrap.css',
            DownloadTypeEnum::BOOTSTRAP_MIN => 'bootstrap.min.css',
            DownloadTypeEnum::VARIABLES => '_variables.scss',
        };
    }
}
