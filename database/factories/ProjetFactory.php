<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'client_id' => factory(App\User::class),
        'negotiator_id' => factory(App\User::class),
        'description' => $faker->paragraph,
        'company_name' => $faker->sentence,
    ];
});
