<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Person;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    $person = factory(Person::class)->make()->toArray();
    return array_merge($person, [
        'email' => $faker->email,
        'password' => $faker->password,
        'num_bedrooms' => $faker->numberBetween(0, 10),
        'num_bathrooms' => $faker->numberBetween(0, 10),
        'num_cars' => $faker->numberBetween(0, 10),
        'num_children' => $faker->numberBetween(0, 10),
        'num_tvs' => $faker->numberBetween(0, 10),
    ]);
});
