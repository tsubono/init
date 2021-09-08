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
            'image_path' => $this->faker->randomElement([asset('img/form-img-picture.svg'), asset('img/profile-img01.png'), asset('img/profile-img02.png'), asset('img/profile-img03.png'), asset('img/avatar-sample01@2x.png'), asset('img/avatar-sample02@2x.png'), asset('img/avatar-sample03@2x.png')]),
        ];
    }
}
