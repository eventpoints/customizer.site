<?php declare(strict_types=1);

namespace App\Entity;

use App\Repository\MessageRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use LLPhant\Chat\Enums\ChatRole;
use LLPhant\Chat\Message as LLPhantMessage;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Serializer\Attribute\Ignore;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column]
    private DateTimeImmutable $sentAt;

    #[ORM\ManyToOne(cascade: ['persist'], inversedBy: 'messages')]
    #[ORM\JoinColumn(nullable: false)]
    #[Ignore]
    private ?Conversation $conversation = null;

    #[ORM\Column(type: Types::BINARY, length: 16777215, nullable: true)]
    private mixed $dto = null;

    public function __construct(#[ORM\Column(nullable: false, enumType: ChatRole::class)]
    private ChatRole $role)
    {
        $this->sentAt = new DateTimeImmutable();
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getRole(): ChatRole
    {
        return $this->role;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    #[Ignore]
    public function getMessage(): LLPhantMessage
    {
        return LLPhantMessage::{$this->getRole()->value}($this->content);
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getSentAt(): ?DateTimeImmutable
    {
        return $this->sentAt;
    }

    public function setSentAt(DateTimeImmutable $sentAt): static
    {
        $this->sentAt = $sentAt;

        return $this;
    }

    public function getConversation(): ?Conversation
    {
        return $this->conversation;
    }

    public function setConversation(?Conversation $conversation): static
    {
        $this->conversation = $conversation;

        return $this;
    }

    public function getDto(): ?object
    {
        return $this->dto ? unserialize(stream_get_contents($this->dto)) : null;
    }

    public function setDto(?object $dto): static
    {
        if (is_object($dto)) {
            $this->dto = serialize($dto);
        }

        return $this;
    }
}
