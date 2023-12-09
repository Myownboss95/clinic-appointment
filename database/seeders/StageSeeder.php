<?php

namespace Database\Seeders;

use App\Constants\StageTypes;
use App\Models\Stage;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (StageTypes::toArray() as $stage) {
            $selectedStage = StageTypes::from($stage);

           
            Stage::create([
                'name' => $stage,
                'slug' => $selectedStage->slug()
            ]);
        }
    }
}
