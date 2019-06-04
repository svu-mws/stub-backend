<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\MaritalStatus;
use Faker\Generator as Faker;

$factory->define(MaritalStatus::class, function (Faker $faker) {
    return [
        'status' => $faker->randomElement(['Married', 'Divorced', 'Never Married'])
    ];
});
