<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\PossessionType;
use Faker\Generator as Faker;

$factory->define(PossessionType::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement(['Owning', 'Renting'])
    ];
});
