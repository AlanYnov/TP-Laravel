<?php

namespace Database\Factories;
use App\Models\{Attachment,User,Task};
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\QueryException;

class AttachmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attachment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'file' => $this->faker->name,
            'filename' => $this->faker->name,
            'size' => $this->faker->randomDigit,
            'type' => $this->faker->name,
            'user_id'=> User::factory(),
            'task_id' => Task::factory(),
        ];
    }
}
