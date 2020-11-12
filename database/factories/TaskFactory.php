<?php

namespace Database\Factories;

use App\Models\{Task,Category,Board};
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arrayValues = ['todo','ongoing','done'];
        return [
            'title' => $this->faker->title,
            'description' => $this->faker->text,
            'due_date' => $this->faker->date(),
            'state' => $arrayValues[rand(0,2)],
            'board_id' => Board::factory(),
            'category_id' => Category::factory(),
        ];
    }
}