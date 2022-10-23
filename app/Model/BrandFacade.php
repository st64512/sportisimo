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

    public function getBrands(int $limit, int $offset, string $orderingByName)
    {
        $query = $this->database
            ->table('brands');

        if ($orderingByName != "")
            $query->order('name ' . $orderingByName);

        $query->limit($limit, $offset);
        return $query;
    }

    public function getBrandsCount(): int
    {
        return $this->database->fetchField('SELECT COUNT(*) FROM brands');
    }

    public function deleteBrand(int $id)
    {
        $this->database
            ->table('brands')
            ->where('id', $id)
            ->delete();
    }

    //public function editBrand() {}
    //public function addBrand() {}
}