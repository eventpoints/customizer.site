<?php declare(strict_types=1);

namespace App\Service;

use App\DataTransferObject\RootDtoInterface;
use ReflectionClass;

final readonly class ClassPropertyService
{
    /**
     * @param RootDtoInterface $rootDto
     * @return array<string, string>
     */
    public static function getClassProperties(RootDtoInterface $rootDto): array
    {
        return self::extractValues($rootDto);
    }

    /**
     * @return array<string, string>
     */
    private static function extractValues(object $dto): array
    {

        $reflectionClass = new ReflectionClass($dto);
        $properties = [];

        foreach ($reflectionClass->getProperties() as $property) {
            $type = $property->getType();
            if (method_exists($type, 'isBuiltin')  && $type->isBuiltin()) {
                $properties[$property->getName()] = $property->getValue($dto);
            } else {
                $properties = array_merge($properties, self::extractValues($property->getValue($dto)));
            }
        }

        return $properties;
    }
}