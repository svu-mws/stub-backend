<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Hobby;
use Faker\Generator as Faker;

$factory->define(Hobby::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Swimming', 'Football', 'Reading', 'Coding'])
    ];
});
