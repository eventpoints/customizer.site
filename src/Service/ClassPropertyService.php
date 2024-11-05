<?php declare(strict_types=1);

namespace App\Service;

use App\DataTransferObject\Bootstrap53\InputDto;
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
            if ($property->getType() instanceof InputDto) {

                /**
                 * @var InputDto $inputDto
                 */
                $inputDto = $property->getValue($dto);
                $properties[$property->getName()] = $inputDto->getValue();
            } elseif (is_object($property->getValue(object: $dto))) {
                $properties = array_merge($properties, self::extractValues(dto: $property->getValue($dto)));
            }
        }

        return $properties;
    }
}