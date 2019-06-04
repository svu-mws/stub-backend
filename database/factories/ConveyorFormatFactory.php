<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\ConveyorFormat;
use Faker\Generator as Faker;

$factory->define(ConveyorFormat::class, function (Faker $faker) {
    return [
        'format' => $faker->randomElement(['DVD', 'VHS', 'Betamax'])
    ];
});
