<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Model\BrandFacade;
use App\Utils\ListPaginator;
use Nette;
use Nette\Application\UI\Form;


final class BrandListPresenter extends Nette\Application\UI\Presenter
{
    private BrandFacade $facade;

    public function __construct(BrandFacade $facade)
    {
        $this->facade = $facade;
    }

    public function renderDefault(int $page = 1, int $itemsPerPage = 2, string $direction = ""): void
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
        $this->template->pageCounts = [5, 10, 15];
        $this->template->itemsPerPage = $itemsPerPage;
    }

    public function handleRemoveBrand(int $id) : void
    {
        $this->facade->deleteBrand($id);
        if ($this->isAjax()) {
            $this->redrawControl('brandList');
            $this->redrawControl('pagination');
        }

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

    protected function createComponentEditForm(): Form
    {
        $form = new Form;
        $form->addHidden('id')->setHtmlId('edit-id');
        $form->addText('name', 'Name:')->setHtmlId('edit-name');
        $form->addSubmit('send', 'Změnit');
        $form->onSuccess[] = [$this, 'editFormSucceeded'];
        return $form;
    }

    public function editFormSucceeded(Form $form, $data): void
    {
        $this->facade->editBrand($data);
        $this->redrawControl('brandList');
    }

    protected function createComponentAddForm(): Form
    {
        $form = new Form;
        $form->addText('name', 'Name:')->setHtmlId('add-name');
        $form->addSubmit('send', 'Přidat');
        $form->onSuccess[] = [$this, 'addFormSucceeded'];
        return $form;
    }

    public function addFormSucceeded(Form $form, $data): void
    {
        $this->facade->addBrand($data);
        if ($this->isAjax()) {
            $this->redrawControl('brandList');
            $this->redrawControl('pagination');
        }
    }
}
