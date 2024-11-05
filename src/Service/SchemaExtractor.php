<?php declare(strict_types=1);

namespace App\Service;

use ReflectionClass;
use OpenApi\Attributes as OA;
use ReflectionProperty;

class SchemaExtractor
{
    /**
     * @return array<string, array<string, int|float|string|bool>>
     */
    public static function render(object $schema): array
    {
        $reflection = new ReflectionClass($schema);

        $result = [];

        foreach ($reflection->getProperties() as $property) {
            if ($attribute = self::getAttribute($property)) {
                $result[$property->getName()] = self::processAttribute($attribute, $property->getValue($schema));
            }
            $type = $property->getType();
            if (!method_exists($type, 'isBuiltin') || !$type->isBuiltin()) {
                $result[$property->getName()] = self::render($property->getValue($schema));
            }
        }
        return $result;
    }

    private static function getAttribute(ReflectionProperty $property): ?OA\Property
    {
        foreach ($property->getAttributes(OA\Property::class) as $attribute) {
            return $attribute->newInstance();
        }
        return null;
    }

    /**
     * @return array<string, int|float|string|bool>
     */
    private static function processAttribute(OA\Property $attribute, int|float|string|bool $defaultValue): array
    {
        return [
            'description' => $attribute->description,
            'type' => $attribute->type,
            'default' => $defaultValue,
        ];
    }
}