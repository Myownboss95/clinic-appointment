<?php

namespace Database\Factories;

use App\Models\CurrencyList;
use Illuminate\Database\Eloquent\Factories\Factory;

class CurrencyListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CurrencyList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->word,
        'name' => $this->faker->word,
        'code' => $this->faker->word,
        'dial_code' => $this->faker->word,
        'currency_name' => $this->faker->word,
        'currency_symbol' => $this->faker->word,
        'currency_code' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
