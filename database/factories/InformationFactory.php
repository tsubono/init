<?php

namespace Database\Factories;

use App\Models\AdviserUser;
use App\Models\Information;
use Illuminate\Database\Eloquent\Factories\Factory;

class InformationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Information::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date,
            'title' => $this->faker->word,
            'content' => $this->faker->realText,
        ];
    }
}
