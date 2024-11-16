<?php declare(strict_types=1);

namespace App\DataTransferObject;

use Symfony\Component\Uid\Uuid;

class AiResponseDto
{
    public function __construct(
        private readonly Uuid              $id,
        private readonly ?string           $response = null,
        private readonly ?RootDtoInterface $dto = null,
    )
    {
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getResponse(): ?string
    {
        return $this->response;
    }

    public function getDto(): ?RootDtoInterface
    {
        return $this->dto;
    }
}