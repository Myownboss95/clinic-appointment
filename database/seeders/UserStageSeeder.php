<?php

namespace Database\Seeders;

use App\Constants\StageTypes;
use App\Constants\SubServicesTypes;
use App\Models\Stage;
use App\Models\SubService;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::where('role_id', 1)->each(function ($user) {

            $faker = Faker::create();

            $stagetype = $faker->randomElement(StageTypes::toArray());
            $stage = Stage::where('name', $stagetype)->first();

            $subservicetype = $faker->randomElement(SubServicesTypes::toArray());
            $subservice = SubService::where('name', $subservicetype)->first();

            $user->stage()->attach($stage->id,
                [
                    'sub_service_id' => $subservice->id,
                    'log' => $faker->sentence(10),
                ]);

        });
    }
}
