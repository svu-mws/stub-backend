<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\MovieSelector;
use Faker\Generator as Faker;

$factory->define(MovieSelector::class, function (Faker $faker) {
    return [
        'selector' => $faker->randomElement(['Me', 'Other', 'Spouse/Partner'])
    ];
});
