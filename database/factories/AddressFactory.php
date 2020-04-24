<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'company_name' => $faker->company,
        'person_name' => $faker->name,
        'street' => $faker->streetAddress,
        'postcode' => $faker->postcode,
        'city' => $faker->city,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
    ];
});
