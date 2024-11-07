<?php declare(strict_types=1);

namespace App\DataTransferObject;

use App\DataTransferObject\Bootstrap53\ColorsDto;

class AiResponseDto
{
    public function __construct(
        private readonly ?string $response = null,
        private readonly ?ColorsDto $colors = null,
    )
    {
    }

    public function getResponse(): ?string
    {
        return $this->response;
    }

    public function getColors(): ?ColorsDto
    {
        return $this->colors;
    }
}