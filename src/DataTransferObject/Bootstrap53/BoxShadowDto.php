<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Body",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class BoxShadowDto
{
    public function __construct(
        private InputDto $boxShadow = new InputDto(label: 'Box Shadow', type: InputTypeEnum::STRING, default: '0 .5rem 1rem rgba($black, .15)'),
        private InputDto $boxShadowSm = new InputDto(label: 'Box Shadow Sm', type: InputTypeEnum::STRING, default: '0 .125rem .25rem rgba($black, .075)'),
        private InputDto $boxShadowLg = new InputDto(label: 'Box Shadow Lg', type: InputTypeEnum::STRING, default: '0 1rem 3rem rgba($black, .175)'),
        private InputDto $boxShadowInset = new InputDto(label: 'Box Shadow Inset', type: InputTypeEnum::STRING, default: 'inset 0 1px 2px rgba($black, .075)'),
    )
    {
    }

    public function getBoxShadow(): InputDto
    {
        return $this->boxShadow;
    }

    public function getBoxShadowSm(): InputDto
    {
        return $this->boxShadowSm;
    }

    public function getBoxShadowLg(): InputDto
    {
        return $this->boxShadowLg;
    }

    public function getBoxShadowInset(): InputDto
    {
        return $this->boxShadowInset;
    }

}
