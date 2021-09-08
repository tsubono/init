<?php

namespace Database\Factories;

use App\Models\LessonImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LessonImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image_path' => $this->faker->randomElement([asset('images/lesson-img01.png'), asset('images/lesson-img02.png'), asset('images/lesson-img03.png')]),
        ];
    }
}
