<?php

namespace Database\Factories;

use App\Models\AdviserUserPersonalInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdviserUserPersonalInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdviserUserPersonalInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['表面', '裏面']),
            'image_path' => $this->faker->randomElement([asset('images/form-img-picture.svg'), asset('images/profile-img01.png'), asset('images/profile-img02.png'), asset('images/profile-img03.png'), asset('images/avatar-sample01@2x.png'), asset('images/avatar-sample02@2x.png'), asset('images/avatar-sample03@2x.png')]),
        ];
    }
}
