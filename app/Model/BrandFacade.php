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

    public function getBrandById(int $id) {
        return $this->database->table('brands')->where('id', $id)->fetch();
    }

    public function deleteBrand(int $id)
    {
        $this->database
            ->table('brands')
            ->where('id', $id)
            ->delete();
    }

    public function editBrand($data) {
        $brandId = $data->id;
        if ($brandId) {
            $this->database->table('brands')->get($brandId)->update($data);
        }
    }

    public function addBrand($data) {
        $this->database->table('brands')->insert($data);
    }
}