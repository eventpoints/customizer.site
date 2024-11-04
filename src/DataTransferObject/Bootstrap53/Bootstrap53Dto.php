<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\RootDtoInterface;
use OpenApi\Attributes as OA;

#[OA\Schema(
    title: "Bootstrap 5.3",
)]
final readonly class Bootstrap53Dto implements RootDtoInterface
{
    public function __construct(
        private ColorsDto $colors = new ColorsDto(),
    )
    {
    }

    public function getColors(): ColorsDto
    {
        return $this->colors;
    }
}