<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\RootDtoInterface;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3",
)]
#[Groups(['form', 'compile'])]
final readonly class CustomizerFormBootstrap53Dto implements RootDtoInterface
{
    public function __construct(
        private ColorsDto $colors = new ColorsDto(),
        private GeneralDto $general = new GeneralDto(),
    )
    {
    }

    public function getColors(): ColorsDto
    {
        return $this->colors;
    }

    public function getGeneral(): GeneralDto
    {
        return $this->general;
    }

}