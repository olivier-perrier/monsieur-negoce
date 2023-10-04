<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
 
class CashingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->numberBetween(0, 5000),
            'taxe' => $this->faker->numberBetween(0, 30),
            'state_id' => $this->faker->numberBetween(45, 46),
            'project_id' => 1,
            'user_id' => 2,
        ];
    }
}
