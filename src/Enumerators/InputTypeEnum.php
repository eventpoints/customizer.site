<?php declare(strict_types=1);

namespace App\Enumerators;

enum InputTypeEnum: string
{
    case COLOR = 'color';
    case FLOAT = 'float';
    case SIZE = 'size';
    case BOOLEAN = 'boolean';
    case STRING = 'string';
    case GRADIENT = 'gradient';
}
