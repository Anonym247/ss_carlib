<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $admin = User::query()->where('email', env('DEFAULT_ADMIN_EMAIL'))->first();

        if (!$admin) {
            User::query()->create([
                'name' => 'Carlib Admin',
                'email' => env('DEFAULT_ADMIN_EMAIL'),
                'password' => bcrypt(env('DEFAULT_ADMIN_PASSWORD')),
            ]);
        }
    }
}
