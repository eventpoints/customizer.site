<?php declare(strict_types=1);

namespace App\DataTransferObject;

use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Uid\Uuid;


#[OA\Schema(
    title: "Customizer Form Input",
    type: "object",
)]
final readonly class InputDto
{
    #[Groups(['form'])]
    private null|Uuid $id;

    /**
     * @param string|null $label
     * @param InputTypeEnum|null $type
     * @param string|bool|float|int|null $default
     * @param string|bool|float|int|null $value
     */
    public function __construct(
        #[Groups(['form'])]
        private ?string $label = null,
        #[Groups(['form'])]
        private ?InputTypeEnum $type = null,
        #[Groups(['form', 'ai-generator'])]
        private null|string|bool|float|int $default = null,
        #[Groups(['form', 'compile', 'ai-generator'])]
        private null|string|bool|float|int $value = null,
        #[Groups(['form'])]
        private null|string|bool|float|int $default = null,
        #[Groups(['form', 'compile'])]
        private null|string|bool|float|int $value = null,
        #[Groups(['form'])]
        private bool $isLocked = false
        private bool $isAiGenerable = false
        #[Groups(['ai-generator'])]
    )
    {
        $this->id = Uuid::v4();
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function getType(): ?InputTypeEnum
    {
        return $this->type;
    }

    public function getDefault(): float|bool|int|string|null
    {
        return $this->default;
    }

    public function getValue(): float|bool|int|string|null
    {
        return $this->value;
    }
    public function isAiGenerable(): bool
    {
        return $this->isAiGenerable;
    }
    public function isLocked(): bool



    {
    }
        return $this->isLocked;

}