<?php declare(strict_types=1);

namespace App\Service;

use App\Attributes\ApiProperty;
use ReflectionClass;
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

    private static function getAttribute(ReflectionProperty $property): ?ApiProperty
    {
        foreach ($property->getAttributes(ApiProperty::class) as $attribute) {
            return $attribute->newInstance();
        }
        return null;
    }

    /**
     * @return array<string, int|float|string|bool>
     */
    private static function processAttribute(ApiProperty $attribute, int|float|string|bool $defaultValue): array
    {
        return [
            'description' => $attribute->title,
            'type' => $attribute->getInputType()->value,
            'default' => $defaultValue,
            'value' => $value
        ];
    }
}