<?php

namespace Database\Factories;

use App\Address;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;
 
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'client_id' => User::factory()->create(['role' => 'client']),
            'negotiator_id' => User::factory()->create(['role' => 'negotiator']),
            'description' => $this->faker->paragraph,
            'address_contact_id' => Address::factory(),
            'state_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'category_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6]),
            'amount_negotiated' => $this->faker->randomNumber(4),
        ];
    }
}

