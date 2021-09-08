<?php

namespace Database\Factories;

use App\Models\AdviserUserImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdviserUserImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdviserUserImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image_path' => $this->faker->randomElement([asset('img/form-img-picture.svg'), asset('img/profile-img01.png'), asset('img/profile-img02.png'), asset('img/profile-img03.png'), asset('img/avatar-sample01@2x.png'), asset('img/avatar-sample02@2x.png'), asset('img/avatar-sample03@2x.png')]),
        ];
    }
}
