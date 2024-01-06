<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserBankDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::where('role_id', 1)->each(function ($user) {

            $faker = Faker::create();
            if (! $user->bankDetail) {
                $user->bankDetail()->create([
                    'bank' => $faker->randomElement(['UBA', 'Zenith', 'GTB']),
                    'accountName' => $user->first_name.' '.$user->last_name,
                    'accountNumber' => '01233944885',
                ]);
            }

        });
    }
}
