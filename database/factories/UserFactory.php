<?php

namespace Database\Factories;

use App\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'role' => $this->faker->randomElement(['client', 'negotiator']),
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'address_id' => Address::factory(),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber(),
            'validated' => $this->faker->numberBetween(0, 1),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}

