<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Database\Factories\DateTime;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'username' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'address' => $this->faker->address(),
            'gender' => $this->faker->randomElement(['1','0']),
            'phone' => $this->faker->phoneNumber(),
            'birthday' => $this->faker->dateTimeThisCentury('+25 years'),
            'residence_idcard' => $this->faker->numberBetween(),
            'account_number' => $this->faker->randomNumber(7, true),
            'remember_token' => Str::random(10),
            'created_at' => $this->faker->dateTimeThisMonth('+30 days'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
