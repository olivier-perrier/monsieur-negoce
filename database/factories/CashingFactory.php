<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cashing;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Cashing::class, function (Faker $faker) {
    return [
        'amount' => $faker->numberBetween(0, 5000),
        'taxe' => $faker->numberBetween(0, 30),
        'state_id' => $faker->numberBetween(45, 46),
        'project_id' => 1,
        'user_id' => 2,
        
    ];
});
