<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create([
            'role_id' => 1
        ]);
        User::factory(5)->create([
            'role_id' => 2
        ]);
        User::factory(1)->create([
            'role_id' => 3
        ]);

        $this->call([
            ServiceSeeder::class,
            SubServiceSeeder::class
        ]);

    }
}
