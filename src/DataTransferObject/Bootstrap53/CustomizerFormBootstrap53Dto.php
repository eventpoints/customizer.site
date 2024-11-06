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
        private ColorsDto          $colors = new ColorsDto(),
        private GeneralDto         $general = new GeneralDto(),
        private BodyDto           $body = new BodyDto(),
        private GridColumnsDto     $gridColumns = new GridColumnsDto(),
        private LinksDto           $links = new LinksDto(),
        private BorderDto         $border = new BorderDto(),
        private BoxShadowDto      $boxShadow = new BoxShadowDto(),
        private FontsDto          $fonts = new FontsDto(),
        private TablesDto          $table = new TablesDto(),

        private ButtonsAndFormsDto $buttonsAndForms = new ButtonsAndFormsDto(),
        private ButtonsDto         $buttons = new ButtonsDto(),
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

    public function getBody(): BodyDto
    {
        return $this->body;
    }

    public function getGridColumns(): GridColumnsDto
    {
        return $this->gridColumns;
    }

    public function getLinks(): LinksDto
    {
        return $this->links;
    }

    public function getBorder(): BorderDto
    {
        return $this->border;
    }

    public function getBoxShadow(): BoxShadowDto
    {
        return $this->boxShadow;
    }

    public function getFonts(): FontsDto
    {
        return $this->fonts;
    }

    public function getTable(): TablesDto
    {
        return $this->table;
    }

    public function getButtonsAndForms(): ButtonsAndFormsDto
    {
        return $this->buttonsAndForms;
    }

    public function getButtons(): ButtonsDto
    {
        return $this->buttons;
    }

}