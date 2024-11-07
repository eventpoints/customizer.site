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
        private BodyDto            $body = new BodyDto(),
        private GridColumnsDto     $gridColumns = new GridColumnsDto(),
        private LinksDto           $links = new LinksDto(),
        private BorderDto          $border = new BorderDto(),
        private BoxShadowDto       $boxShadow = new BoxShadowDto(),
        private FontsDto           $fonts = new FontsDto(),
        private TablesDto          $table = new TablesDto(),
        private ButtonsAndFormsDto $buttonsAndForms = new ButtonsAndFormsDto(),
        private ButtonsDto         $buttons = new ButtonsDto(),
        private FormsDto           $forms = new FormsDto(),
        private ZIndexDto          $zIndex = new ZIndexDto(),
        private NavsDto            $nav = new NavsDto(),
        private NavbarDto          $navbar = new NavbarDto(),
        private PaginationDto      $pagination = new PaginationDto(),
        private CardsDto           $cards = new CardsDto(),
        private AccordionDto       $accordion = new AccordionDto(),
        private TooltipsDto        $tooltips = new TooltipsDto(),
        private PopoversDto        $popovers = new PopoversDto(),
        private ToastsDto          $toasts = new ToastsDto(),
        private BadgesDto          $badges = new BadgesDto(),
        private ModalsDto          $modals = new ModalsDto(),
        private AlertsDto          $alerts = new AlertsDto(),
        private ProgressBarDto     $progressBar = new ProgressBarDto(),
        private ListGroupDto       $listGroup = new ListGroupDto(),
        private ImageThumbnailsDto $imageThumbnails = new ImageThumbnailsDto(),
        private FiguresDto         $figures = new FiguresDto(),
        private BreadCrumbsDto     $breadCrumbs = new BreadCrumbsDto(),
        private CarouselDto        $carousel = new CarouselDto(),
        private SpinnersDto        $spinnersDto = new SpinnersDto(),
        private CloseDto           $close = new CloseDto(),
        private OffCanvasDto       $offCanvas = new OffCanvasDto(),
        private CodeDto            $code = new CodeDto(),
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

    public function getForms(): FormsDto
    {
        return $this->forms;
    }

    public function getZIndex(): ZIndexDto
    {
        return $this->zIndex;
    }

    public function getNav(): NavsDto
    {
        return $this->nav;
    }

    public function getNavbar(): NavbarDto
    {
        return $this->navbar;
    }

    public function getPagination(): PaginationDto
    {
        return $this->pagination;
    }

    public function getCards(): CardsDto
    {
        return $this->cards;
    }

    public function getAccordion(): AccordionDto
    {
        return $this->accordion;
    }

    public function getTooltips(): TooltipsDto
    {
        return $this->tooltips;
    }

    public function getPopovers(): PopoversDto
    {
        return $this->popovers;
    }

    public function getToasts(): ToastsDto
    {
        return $this->toasts;
    }

    public function getBadges(): BadgesDto
    {
        return $this->badges;
    }

    public function getModals(): ModalsDto
    {
        return $this->modals;
    }

    public function getAlerts(): AlertsDto
    {
        return $this->alerts;
    }

    public function getProgressBar(): ProgressBarDto
    {
        return $this->progressBar;
    }

    public function getListGroup(): ListGroupDto
    {
        return $this->listGroup;
    }

    public function getImageThumbnails(): ImageThumbnailsDto
    {
        return $this->imageThumbnails;
    }

    public function getFigures(): FiguresDto
    {
        return $this->figures;
    }

    public function getBreadCrumbs(): BreadCrumbsDto
    {
        return $this->breadCrumbs;
    }

    public function getCarousel(): CarouselDto
    {
        return $this->carousel;
    }

    public function getSpinnersDto(): SpinnersDto
    {
        return $this->spinnersDto;
    }

    public function getClose(): CloseDto
    {
        return $this->close;
    }

    public function getOffCanvas(): OffCanvasDto
    {
        return $this->offCanvas;
    }

    public function getCode(): CodeDto
    {
        return $this->code;
    }
}