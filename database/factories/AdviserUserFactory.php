<?php

namespace Database\Factories;

use App\Models\AdviserUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdviserUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdviserUser::class;

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
            'zipcode' => $this->faker->postcode,
            'address' => $this->faker->address,
            'skype_name' => $this->faker->word,
            'skype_id' => $this->faker->word,
            'from_country_id' => $this->faker->numberBetween(1, 7),
            'residence_country_id' => $this->faker->numberBetween(1, 7),
            'qualification_text' => $this->faker->text,
            'pr_text' => $this->faker->text,
            'available_time_monday_start' => $this->faker->time,
            'available_time_monday_end' => $this->faker->time,
            'available_time_tuesday_start' => $this->faker->time,
            'available_time_tuesday_end' => $this->faker->time,
            'available_time_wednesday_start' => $this->faker->time,
            'available_time_wednesday_end' => $this->faker->time,
            'available_time_thursday_start' => $this->faker->time,
            'available_time_thursday_end' => $this->faker->time,
            'available_time_friday_start' => $this->faker->time,
            'available_time_friday_end' => $this->faker->time,
            'available_time_saturday_start' => $this->faker->time,
            'available_time_saturday_end' => $this->faker->time,
            'available_time_sunday_start' => $this->faker->time,
            'available_time_sunday_end' => $this->faker->time,
            'reason_text' => $this->faker->text,
            'passion_text' => $this->faker->text,
            'payment_method' => $this->faker->randomElement(['Paypal送金', '口座振替']),
            'paypal_email' => $this->faker->email,
            'account_image_1' => asset('images/form-img-picture.svg'),
            'account_image_2' => asset('images/form-img-picture.svg'),
            'can_open_lesson' => true,
        ];
    }
}
