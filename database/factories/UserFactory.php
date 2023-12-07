<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

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
        $name = $this->faker->unique()->firstName();
        return [
        'name' => $name,
        'email' => $this->faker->unique()->email(),
        'role_id' => $this->faker->randomDigitNotNull,
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'password' => Hash::make('password'),
        'referral_code' => User::generateReferralCode($name),
        'gender' => $this->faker->randomElement(['male', 'female']),
        'balance' => $this->faker->randomDigitNotNull,
        'life_time_balance' => $this->faker->randomDigitNotNull,
        'email_verified_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
