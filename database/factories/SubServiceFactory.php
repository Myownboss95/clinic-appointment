<?php

namespace Database\Factories;

use App\Models\SubService;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubService::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomDigitNotNull,
            'service_id' => $this->faker->randomDigitNotNull,
            'price' => $this->faker->randomDigitNotNull,
            'description' => $this->faker->text,
            'image' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        ];
    }
}
