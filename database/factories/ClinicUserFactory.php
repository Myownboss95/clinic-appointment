<?php

namespace Database\Factories;

use App\Models\ClinicUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClinicUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClinicUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigitNotNull,
            'clinic_id' => $this->faker->randomDigitNotNull,
            'role' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        ];
    }
}
