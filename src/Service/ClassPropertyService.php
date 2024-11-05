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
        return self::extractValues($rootDto);
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
            $property->setAccessible(accessible: true);
            /**
             * @var InputDto $inputDto
             */
            $inputDto = $property->getValue($dto);

            if ($inputDto instanceof InputDto && !empty($inputDto->getValue())) {
                $properties[$property->getName()] = $inputDto->getValue();
            } elseif (is_object($inputDto)) {
                $properties = array_merge($properties, self::extractValues($inputDto));
            }
        }

        return $properties;
    }
}
