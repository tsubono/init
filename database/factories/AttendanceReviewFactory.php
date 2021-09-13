<?php

namespace Database\Factories;

use App\Models\AdviserUser;
use App\Models\AttendanceReview;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AttendanceReview::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rate' => $this->faker->numberBetween(1, 7),
            'content' => $this->faker->text,
        ];
    }
}
