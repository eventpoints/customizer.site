<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Grid Columns",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class GridColumnsDto
{
    public function __construct(
        private InputDto $gridColumns = new InputDto(label: 'Grid Columns', type: InputTypeEnum::INTEGER, default: '12', isLocked: true),
        private InputDto $gridGutterWidth = new InputDto(label: 'Grid Gutter Width', type: InputTypeEnum::SIZE, default: '1.5rem'),
        private InputDto $gridRowColumns = new InputDto(label: 'Grid Row Columns', type: InputTypeEnum::INTEGER, default: '6', isLocked: true),
    )
    {
    }

    public function getGridColumns(): InputDto
    {
        return $this->gridColumns;
    }

    public function getGridGutterWidth(): InputDto
    {
        return $this->gridGutterWidth;
    }

    public function getGridRowColumns(): InputDto
    {
        return $this->gridRowColumns;
    }
}
