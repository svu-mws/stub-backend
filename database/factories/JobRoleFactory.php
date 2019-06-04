<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\JobRole;
use Faker\Generator as Faker;

$factory->define(JobRole::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle
    ];
});
