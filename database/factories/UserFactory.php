<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'email' => $this->faker->word,
        'city_id' => $this->faker->randomDigitNotNull,
        'state_id' => $this->faker->randomDigitNotNull,
        'country_id' => $this->faker->randomDigitNotNull,
        'role_id' => $this->faker->randomDigitNotNull,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'password' => $this->faker->word,
        'gender' => $this->faker->word,
        'balance' => $this->faker->randomDigitNotNull,
        'life_time_balance' => $this->faker->randomDigitNotNull,
        'referral_code' => $this->faker->word,
        'referred_by_user_id' => $this->faker->randomDigitNotNull,
        'email_verified_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
