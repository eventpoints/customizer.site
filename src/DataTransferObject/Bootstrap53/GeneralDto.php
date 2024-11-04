<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;

#[OA\Schema(
    title: "Bootstrap 5.3 - General",
    type: "object",
)]
final readonly class GeneralDto
{

    public function __construct(
        #[OA\Property(
            description: 'Border Radius',
            type: InputTypeEnum::RADIUS->value
        )]
        private null|string $borderRadius = "0.375rem",
    )
    {}

    public function getBorderRadius(): ?string
    {
        return $this->borderRadius;
    }

}
