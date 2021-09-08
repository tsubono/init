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
            'image_path' => $this->faker->randomElement([asset('images/form-img-picture.svg'), asset('images/profile-img01.png'), asset('images/profile-img02.png'), asset('images/profile-img03.png'), asset('images/avatar-sample01@2x.png'), asset('images/avatar-sample02@2x.png'), asset('images/avatar-sample03@2x.png')]),
        ];
    }
}
