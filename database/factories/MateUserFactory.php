<?php

namespace Database\Factories;

use App\Models\MateUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class MateUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MateUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'family_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'family_name_kana' => $this->faker->lastName,
            'first_name_kana' => $this->faker->firstName,
            'email' => $this->faker->email,
            'email_verified_at' => now(),
            'password' => \Hash::make('test'),
            'gender' => $this->faker->randomElement(['男性', '女性']),
            'birthday' => $this->faker->date,
            'tel' => $this->faker->phoneNumber,
            'skype_name' => $this->faker->word,
            'skype_id' => $this->faker->word,
            'image_path' => $this->faker->randomElement([asset('images/form-img-picture.svg'), asset('images/profile-img01.png'), asset('images/profile-img02.png'), asset('images/profile-img03.png'), asset('images/avatar-sample01@2x.png'), asset('images/avatar-sample02@2x.png'), asset('images/avatar-sample03@2x.png')]),
            'from_country_id' => $this->faker->numberBetween(1, 7),
            'residence_country_id' => $this->faker->numberBetween(1, 7),
            'pr_text' => $this->faker->text,
            'is_notice' => $this->faker->randomElement([true, false]),
            'can_apply' => true,
        ];
    }
}
