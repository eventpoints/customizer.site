<?php declare(strict_types=1);

namespace App\Service;

use App\DataTransferObject\InputDto;
use App\DataTransferObject\RootDtoInterface;
use ReflectionClass;

final readonly class ClassPropertyService
{
    /**
     * @param RootDtoInterface $rootDto
     * @return array<string, string|null>
     */
    public static function getClassProperties(RootDtoInterface $rootDto): array
    {
        return self::sortVariables(self::extractValues($rootDto));
    }

    /**
     * Recursively extract `title => value` pairs from the DTO structure.
     *
     * @return array<string, string|null>
     */
    private static function extractValues(object $dto): array
    {
        $reflectionClass = new ReflectionClass($dto);
        $properties = [];

        foreach ($reflectionClass->getProperties() as $property) {
            $propertyValue = $property->getValue($dto);

            if ($propertyValue instanceof InputDto && !empty($propertyValue->getValue())) {
                $properties[$property->getName()] = $propertyValue->getValue();
            } elseif (is_object($propertyValue)) {
                $properties = array_merge($properties, self::extractValues(dto: $property->getValue($dto)));
            }
        }

        return $properties;
    }

    /**
     * @param array<string, string|null> $variables
     * @return array<string, string|null>
     */
    private static function sortVariables(array $variables): array
    {
        uasort($variables, function ($valueA, $keyA) use ($variables): int {
            if (str_starts_with($valueA, '$')) {
                $referencedKey = substr($valueA, 1);
                return array_key_exists($referencedKey, $variables) ? 1 : 0;
            }
            return 0;
        });

        return $variables;
    }

}
