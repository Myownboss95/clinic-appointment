<?php

namespace Database\Seeders;

use App\Constants\ServiceTypes;
use App\Models\Service;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (ServiceTypes::toArray() as $service) {
            $selectedService = ServiceTypes::from($service);

            // Create a service
            Service::create([
                'name' => $service,
                'slug' => $selectedService->slug(),
            ]);
        }
    }
}
