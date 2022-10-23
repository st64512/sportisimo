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

    public function renderDefault(int $page = 1, string $direction = "", int $itemsPerPage = 2): void
    {
        $brandsCount = $this->facade->getBrandsCount();
        $paginator = new ListPaginator();
        $paginator->setItemCount($brandsCount)
            ->setItemsPerPage($itemsPerPage)
            ->setPage($page);

        $brands = $this->facade->getBrands($paginator->getLength(), $paginator->getOffset(), $direction);
        $this->template->brands = $brands;
        $this->template->paginator = $paginator;
        $this->template->direction = $direction;
        $this->template->itemsPerPage = $itemsPerPage;
    }

    public function handleRemoveBrand(int $id) : void
    {
        $this->facade->deleteBrand($id);
    }

    public function handleChangeOrderingByName(string $orderDirection)
    {
        if (strcmp($this->orderingByName, $orderDirection) == 0 )
        {
            $this->orderingByName = "";
        } else {
            $this->orderingByName = $orderDirection;
        }
    }
}
