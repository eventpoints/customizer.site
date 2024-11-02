<?php

namespace App\DataTransferObject;

use App\Service\FileBuilderService\FileBuilderInterface;

readonly class DownloadTypeDto
{
    public function __construct(
        /** @var class-string<FileBuilderInterface> */
        private string $builderFqn,
        private string $fileName,
        private string $mimeType,
    )
    {
    }

    public function getBuilderFqn(): string
    {
        return $this->builderFqn;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function getMimeType(): string
    {
        return $this->mimeType;
    }
}