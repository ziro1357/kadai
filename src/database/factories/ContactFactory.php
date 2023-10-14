<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'fullname'=> $this->faker->name(),
        'gender' => $this->faker->randomElement(['男性', '女性']),
        'email'=> $this->faker->email,
        'code'=> $this->faker->numerify('###-####'),
        'address'=> $this->faker->streetAddress(),
        'building'=> $this->faker->secondaryAddress(),
        'content' => $this->faker->realText($maxNbChars = 120),
        'created_at'=> $this->faker->dateTime($max = 'now', $timezone = date_default_timezone_get())
        ];
    }
}
