<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Lead Factory
|--------------------------------------------------------------------------
|
| Generate test data for leads.
|
*/

$factory->define(BoldLeads\Lead::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'home_square_footage' => $faker->randomDigit
    ];
});
