<?php

namespace Database\Factories;

use App\Models\PasswordReset;
use Illuminate\Database\Eloquent\Factories\Factory;

class PasswordResetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PasswordReset::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->word,
            'token' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
        ];
    }
}
