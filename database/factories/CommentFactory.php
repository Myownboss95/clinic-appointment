<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'model_name' => $this->faker->word,
            'model_id' => $this->faker->randomDigitNotNull,
            'body' => $this->faker->text,
            'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'user_id' => $this->faker->randomDigitNotNull,
            'staff_user_id' => $this->faker->randomDigitNotNull,
        ];
    }
}
