<?php

namespace Database\Factories;

use App\Models\MateUserCoin;
use Illuminate\Database\Eloquent\Factories\Factory;

class MateUserCoinFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MateUserCoin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->numberBetween(-100, 100),
        ];
    }
}
