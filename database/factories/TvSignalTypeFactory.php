<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\TvSignalType;
use Faker\Generator as Faker;

$factory->define(TvSignalType::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement(['Cable', 'Digital Satellite'])
    ];
});
