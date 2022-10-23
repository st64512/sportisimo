<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Model\BrandFacade;
use App\Utils\ListPaginator;
use Nette;


final class BrandListPresenter extends Nette\Application\UI\Presenter
{
    private BrandFacade $facade;

    public function __construct(BrandFacade $facade)
    {
        $this->facade = $facade;
    }

    public function renderDefault(int $page = 1, int $itemsPerPage = 2): void
    {
        $brandsCount = $this->facade->getBrandsCount();
        $paginator = new ListPaginator();
        $paginator->setItemCount($brandsCount)
            ->setItemsPerPage($itemsPerPage)
            ->setPage($page);

        $brands = $this->facade->getBrands($paginator->getLength(), $paginator->getOffset());
        $this->template->brands = $brands;
        $this->template->paginator = $paginator;
    }
}
