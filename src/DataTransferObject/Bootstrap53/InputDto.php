<?php

namespace App\DataTransferObject\Bootstrap53;

use App\Attributes\ApiProperty;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;


#[OA\Schema(
    title: "Customizer Form Input",
    type: "object",
)]
final readonly class InputDto
{

    /**
     * @param string|null $label
     * @param string|null $type
     * @param string|null $default
     * @param string|null $value
     */
    public function __construct(
        #[Groups(['form'])]
        private null|string $label,
        #[Groups(['form'])]
        private null|string $type,
        #[Groups(['form'])]
        private null|string $default,
        #[Groups(['form', 'compile'])]
        private null|string $value = null
    )
    {
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getDefault(): ?string
    {
        return $this->default;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

}