<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'gender' => $faker->randomElement(['m', 'f', 'u']),
        'birthdate' => $faker->date(),
        'profile_image' => $faker->imageUrl()
    ];
});
