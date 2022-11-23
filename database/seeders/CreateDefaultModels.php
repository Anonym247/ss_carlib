<?php

namespace Database\Seeders;

use App\Models\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateDefaultModels extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        if (DB::table('models')->count()) {
            return;
        }

        $data = [
            [
                'id' => 1,
                'brand_id' => 1,
                'name' => '750iL',
            ],
            [
                'id' => 2,
                'brand_id' => 2,
                'name' => 'RS7',
            ],
            [
                'id' => 3,
                'brand_id' => 3,
                'name' => 'W220',
            ],
        ];

        foreach ($data as $datum) {
            Model::query()->updateOrCreate(
                [
                    'id' => $datum['id'],
                ],
                $datum
            );
        }
    }
}
