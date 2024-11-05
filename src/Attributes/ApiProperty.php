<?php declare(strict_types=1);

namespace App\Attributes;

use App\Enumerators\InputTypeEnum;
use Attribute;
use OpenApi\Attributes as OA;
use OpenApi\Attributes\AdditionalProperties;
use OpenApi\Attributes\Attachable;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use OpenApi\Attributes\Xml;
use OpenApi\Generator;

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_PROPERTY | Attribute::TARGET_PARAMETER | Attribute::TARGET_CLASS_CONSTANT | Attribute::IS_REPEATABLE)]
class ApiProperty extends Property
{

    /**
     * @param string|non-empty-array<string>|null                           $type
     * @param string|class-string|object|null                               $ref
     * @param string[]                                                      $required
     * @param Property[]                                                    $properties
     * @param int|float                                                     $maximum
     * @param int|float                                                     $minimum
     * @param array<string|int|float|bool|\UnitEnum|null>|class-string|null $enum
     * @param array<Schema|OA\Schema>                                       $allOf
     * @param array<Schema|OA\Schema>                                       $anyOf
     * @param array<Schema|OA\Schema>                                       $oneOf
     * @param array<string,mixed>|null                                      $x
     * @param Attachable[]|null                                             $attachables
     */
    public function __construct(
        ?string $property = null,
        // schema
        string|object|null $ref = null,
        ?string $schema = null,
        ?string $title = null,
        ?string $description = null,
        ?int $maxProperties = null,
        ?int $minProperties = null,
        ?array $required = null,
        ?array $properties = null,
        string|array|null $type = null,
        ?string $format = null,
        ?string $collectionFormat = null,
        mixed $default = Generator::UNDEFINED,
        mixed $maximum = null,
        bool|int|float|null $exclusiveMaximum = null,
        bool|int|float|null $minimum = null,
        bool|int|float|null $exclusiveMinimum = null,
        ?int $maxLength = null,
        ?int $minLength = null,
        ?int $maxItems = null,
        ?int $minItems = null,
        ?bool $uniqueItems = null,
        ?string $pattern = null,
        array|string|null $enum = null,
        ?bool $readOnly = null,
        ?bool $writeOnly = null,
        ?Xml $xml = null,
        mixed $example = Generator::UNDEFINED,
        ?bool $nullable = null,
        ?bool $deprecated = null,
        ?array $allOf = null,
        ?array $anyOf = null,
        ?array $oneOf = null,
        AdditionalProperties|bool|null $additionalProperties = null,
        // annotation
        ?array $x = null,
        ?array $attachables = null,
        // extends
        private readonly ?InputTypeEnum $inputType = null,
    ) {
        parent::__construct(
            property: $property,
            // schema
            ref: $ref,
            schema: $schema,
            title: $title,
            description: $description,
            maxProperties: $maxProperties,
            minProperties: $minProperties,
            required: $required,
            properties: $properties,
            type: $type,
            format: $format,
            collectionFormat: $collectionFormat,
            default: $default,
            maximum: $maximum,
            exclusiveMaximum: $exclusiveMaximum,
            minimum: $minimum,
            exclusiveMinimum: $exclusiveMinimum,
            maxLength: $maxLength,
            minLength: $minLength,
            maxItems: $maxItems,
            minItems: $minItems,
            uniqueItems: $uniqueItems,
            pattern: $pattern,
            enum: $enum,
            readOnly: $readOnly,
            writeOnly: $writeOnly,
            xml: $xml,
            example: $example,
            nullable: $nullable,
            deprecated: $deprecated,
            allOf: $allOf,
            anyOf: $anyOf,
            oneOf: $oneOf,
            additionalProperties: $additionalProperties,
            // annotation
            x: $x,
            attachables: $attachables,
        );
    }

    public function getInputType(): ?InputTypeEnum
    {
        return $this->inputType;
    }
}