<?php

namespace Database\Factories;

use App\Models\AdviserUserMovie;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdviserUserMovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdviserUserMovie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'movie_path' => $this->faker->randomElement(['https://www.youtube.com/watch?v=sofXBWmHgW4', 'https://www.youtube.com/watch?v=v9SGGEIb0-g', 'https://www.youtube.com/watch?v=DlKP4LH1h3w', 'https://www.youtube.com/watch?v=PBzzcltciN0']),
        ];
    }
}
