<?php declare(strict_types=1);

namespace App\Service;

use App\DataTransferObject\InputDto;
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
            /** @var InputDto $propertyValue */
            $propertyValue = $property->getValue($dto);

            if ($propertyValue instanceof InputDto && $propertyValue->getValue()) {
                $properties[$property->getName()] = $propertyValue->getValue();
            } elseif (is_object($propertyValue)) {
                $properties = array_merge($properties, self::extractValues(dto: $property->getValue($dto)));
            }
        }

        return $properties;
    }
}