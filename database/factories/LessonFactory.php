<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(30),
            'coin_amount' => $this->faker->numberBetween(10, 100),
            'description' => $this->faker->realText,
            'mst_language_id' => $this->faker->numberBetween(1, 7),
            'is_stop' => $this->faker->randomElement([true, false]),
        ];
    }
}
