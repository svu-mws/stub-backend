<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Frequency;
use Faker\Generator as Faker;

$factory->define(Frequency::class, function (Faker $faker) {
    return [
        'frequency' => $faker->randomElement(['Never', 'Rarely', 'Daily', 'Monthly'])
    ];
});
