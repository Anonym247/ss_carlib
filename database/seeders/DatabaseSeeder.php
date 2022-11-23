<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(CreateAdminUser::class);

        $this->call(CreateDefaultBrands::class);
        $this->call(CreateDefaultModels::class);
        $this->call(CreateDefaultCars::class);
    }
}
