<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\InternetConnection;
use Faker\Generator as Faker;

$factory->define(InternetConnection::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement(['DSL', 'Cable Modern', 'Dial-Up'])
    ];
});
