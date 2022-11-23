<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateDefaultBrands extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        if (DB::table('brands')->count()) {
            return;
        }

        $data = [
            [
                'id' => 1,
                'name' => 'BMW',
            ],
            [
                'id' => 2,
                'name' => 'Audi',
            ],
            [
                'id' => 3,
                'name' => 'Mercedes',
            ],
        ];

        foreach ($data as $datum) {
            Brand::query()->updateOrCreate(
                [
                    'id' => $datum['id'],
                ],
                $datum
            );
        }
    }
}
