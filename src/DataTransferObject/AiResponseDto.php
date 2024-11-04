<?php

namespace App\DataTransferObject;

use App\DataTransferObject\Bootstrap53\ColorsDto;
use OpenApi\Attributes as OA;

class AiResponseDto
{
    public function __construct(
        private string $response,
        private ColorsDto $colors,
    )
    {
    }

    public function getResponse(): string
    {
        return $this->response;
    }

    public function getColors(): ColorsDto
    {
        return $this->colors;
    }
}