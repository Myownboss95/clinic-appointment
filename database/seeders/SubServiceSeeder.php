<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\SubService;
use Faker\Factory as Faker;
use App\Constants\ServiceTypes;
use Illuminate\Database\Seeder;
use App\Constants\SubServicesTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (SubServicesTypes::toArray() as $subservice) {
            $selectedSubService = SubServicesTypes::from($subservice);
            $service = Service::where('name', $selectedSubService->service())->first();
            // Create a Country
            SubService::create([
                'name' => $subservice,
                'slug' => $selectedSubService->slug(),
                'description' => $selectedSubService->description(),
                'service_id' => $service->id,
                'image' => $faker->imageUrl(144, 144),
                'price' => $faker->numberBetween(10000, 500000)
            ]);
        }
    }
}
