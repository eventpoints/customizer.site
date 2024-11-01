<?php

namespace App\Enumerators;

enum DownloadTypeEnum: string
{
    case BOOTSTRAP = 'bootstrap';
    case BOOTSTRAP_MIN = 'bootstrapMin';
    case VARIABLES = 'variables';
}
