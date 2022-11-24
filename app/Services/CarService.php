<?php

namespace App\Services;

use App\Models\Car;

class CarService
{
    public function getById(int $id)
    {
        return Car::findOrFail($id);
    }
}
