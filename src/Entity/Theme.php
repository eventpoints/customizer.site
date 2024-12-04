<?php declare(strict_types=1);

namespace App\Entity;

use App\Doctrine\UuidV4Generator;
use App\Repository\ThemeRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\Ignore;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: ThemeRepository::class)]
#[Groups('theme')]
class Theme
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidV4Generator::class)]
    private ?Uuid $id = null;

    #[ORM\Column(type: Types::BINARY)]
    private mixed $dto = null;

    #[ORM\Column]
    private DateTimeImmutable $createdAt;

    #[ORM\ManyToOne(inversedBy: 'themes')]
    #[ORM\JoinColumn(nullable: false)]
    #[Ignore]
    private User $owner;

    public function __construct(
        #[ORM\Column(length: 255)]
        private ?string $name,
        object          $dto
    )
    {
        $this->setDto($dto);
        $this->createdAt = new DateTimeImmutable();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getDto(): ?object
    {
        return is_string($this->dto) ? unserialize($this->dto) : unserialize(stream_get_contents($this->dto));
    }

    public function setDto(object $dto): static
    {
        $this->dto = serialize($dto);

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): static
    {
        $this->owner = $owner;

        return $this;
    }
}
