<?php

namespace App\Model;

use Nette;

final class BrandFacade
{
    use Nette\SmartObject;

    private Nette\Database\Explorer $database;

    public function __construct(Nette\Database\Explorer $database)
    {
        $this->database = $database;
    }

    public function getBrands(int $limit, int $offset)
    {
        return $this->database
            ->table('brands')
            ->limit($limit, $offset);
    }

    public function getBrandsCount(): int
    {
        return $this->database->fetchField('SELECT COUNT(*) FROM brands');
    }

    //public function editBrand() {}
    //public function deleteBrand() {}
}