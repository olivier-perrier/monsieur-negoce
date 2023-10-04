<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
 
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_id' => $this->faker->numberBetween(42, 44),
            'content' => $this->faker->word(),
            'project_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
