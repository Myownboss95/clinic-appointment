<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

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
        'start_time' => $this->faker->date('Y-m-d H:i:s'),
        'end_time' => $this->faker->date('Y-m-d H:i:s'),
        'stage_id' => $this->faker->word,
        'created_at' => $this->faker->randomDigitNotNull,
        'updated_at' => $this->faker->randomDigitNotNull,
        'deleted_at' => $this->faker->randomDigitNotNull
        ];
    }
}
