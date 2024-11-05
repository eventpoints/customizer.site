<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Colors",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class ColorsDto
{

    /**
     * @param InputDto $bodyBg
     * @param InputDto $primary
     */
    public function __construct(
        private InputDto $bodyBg = new InputDto(label: 'Body bg', type: InputTypeEnum::COLOR, default: '#ffffff'),
        private InputDto $primary = new InputDto(label: 'primary color', type: InputTypeEnum::COLOR, default: '#0d6efd'),
    )
    {
    }

    public function getBodyBg(): InputDto
    {
        return $this->bodyBg;
    }

    public function getPrimary(): InputDto
    {
        return $this->primary;
    }

}
