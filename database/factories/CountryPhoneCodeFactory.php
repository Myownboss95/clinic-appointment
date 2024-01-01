<?php

namespace Database\Factories;

use App\Models\CountryPhoneCode;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryPhoneCodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CountryPhoneCode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->randomDigitNotNull,
            'name' => $this->faker->word,
            'dial_code' => $this->faker->word,
            'dial_min_length' => $this->faker->randomDigitNotNull,
            'dial_max_length' => $this->faker->randomDigitNotNull,
            'code' => $this->faker->word,
            'currency_name' => $this->faker->word,
            'currency_code' => $this->faker->word,
            'currency_symbol' => $this->faker->word,
            'flag' => $this->faker->word,
            'active' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        ];
    }
}
