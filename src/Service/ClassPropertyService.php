<?php

namespace App\Service;

use App\DataTransferObject\VariablesDto;
use ReflectionClass;

final readonly class ClassPropertyService
{
    /**
     * @param VariablesDto $variablesDto
     * @return array<string, string>
     */
    public static function getClassProperties(VariablesDto $variablesDto) : array
    {
        $reflectionClass = new ReflectionClass($variablesDto);
        $properties = [];

        foreach ($reflectionClass->getProperties() as $property) {
            $properties[$property->getName()] = $property->getValue($variablesDto);
        }

        return $properties;
    }

}