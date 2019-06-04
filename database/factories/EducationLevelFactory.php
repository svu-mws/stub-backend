<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\EducationLevel;
use Faker\Generator as Faker;

$factory->define(EducationLevel::class, function (Faker $faker) {
    return [
        'level' => $faker->randomElement(['Doctorate', 'Master\'s Degree', 'Bachelor\'s Degree'])
    ];
});
