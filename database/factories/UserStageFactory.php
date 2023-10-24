<?php

namespace Database\Factories;

use App\Models\UserStage;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserStageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserStage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigitNotNull,
        'sub_service_id' => $this->faker->randomDigitNotNull,
        'service_id' => $this->faker->randomDigitNotNull,
        'log' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
