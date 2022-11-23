<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateDefaultCars extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        if (DB::table('cars')->count()) {
            return;
        }

        $model = new Car();

        $model::$ignoreMutators = true;

        $data = [
            [
                'id' => 1,
                'model_id' => 1,
                'year' => 1995,
                'photo' => 'defaults/bmw_750il.jpeg',
                'state_number' => 'o248BH77',
                'color' => '#000',
                'transmission' => 'auto',
                'rental_price_per_day' => 100.00
            ],
            [
                'id' => 2,
                'model_id' => 2,
                'year' => 2009,
                'photo' => 'defaults/audi_rs7.jpeg',
                'state_number' => '99-RJ-110',
                'color' => '#FF0040',
                'transmission' => 'manual',
                'rental_price_per_day' => 200.00
            ],
            [
                'id' => 3,
                'model_id' => 3,
                'year' => 2003,
                'photo' => 'defaults/mercedes_w220.jpeg',
                'state_number' => 'SSV705',
                'color' => '#B4B5B0',
                'transmission' => 'auto',
                'rental_price_per_day' => 50.00
            ]
        ];

        foreach ($data as $datum) {
            $model->newQuery()->updateOrCreate(
                [
                    'id' => $datum['id'],
                ],
                $datum
            );
        }
    }
}
