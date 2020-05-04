<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(),
        'client_id' => factory(App\User::class)->create(['role' => 'client']),
        'negotiator_id' => factory(App\User::class)->create(['role' => 'negotiator']),
        'description' => $faker->paragraph,
        'address_contact_id' =>factory(App\Address::class),
        'state_id' => $faker->randomElement([1, 2, 3, 4, 5]),
        'category_id' => $faker->randomElement([1, 2, 3, 4, 5, 6]),
        'amount_negotiated' => $faker->randomNumber(4),
        'fee_negotiator_pourcent' => $faker->randomNumber(2),
    ];
});
