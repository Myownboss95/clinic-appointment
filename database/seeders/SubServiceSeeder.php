<?php

namespace Database\Seeders;

use App\Constants\SubServicesTypes;
use App\Models\Service;
use App\Models\SubService;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

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
            // Create a subservice
            SubService::create([
                'name' => $subservice,
                'slug' => $selectedSubService->slug(),
                'description' => $selectedSubService->description(),
                'service_id' => $service->id,
                'image' => $faker->imageUrl(144, 144),
                'price' => $selectedSubService->price(),
            ]);
        }
    }
}
