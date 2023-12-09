<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\SubService;
use Faker\Factory as Faker;
use App\Constants\ServiceTypes;
use App\Constants\StageTypes;
use Illuminate\Database\Seeder;
use App\Constants\SubServicesTypes;
use App\Models\Stage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::where('role_id', 1)->each( function ($user) {
            
            $faker = Faker::create();

            $stagetype = $faker->randomElement(StageTypes::toArray());
            $stage = Stage::where('name', $stagetype)->first();

            $subservicetype = $faker->randomElement(SubServicesTypes::toArray());
            $subservice = SubService::where('name', $subservicetype)->first();

            $user->stage()->attach($stage->id,
                [ 
                    'sub_service_id' => $subservice->id,
                    'log' => $faker->sentence(10)
                ]);
            
        });
    }
}
