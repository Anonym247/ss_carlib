<?php

namespace App\Services;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BrandService
{
    public function getAll(): Collection
    {
        return Brand::all();
    }

    public function getById(int $id)
    {
        return Brand::findOrFail($id);
    }

    public function save(Brand $brand, array $attributes): Brand
    {
        $brand->fill($attributes);

        $brand->save();

        return $brand;
    }

    public function delete(Brand $brand): void
    {
        $brand->delete();
    }
}
