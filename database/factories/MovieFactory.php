<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, static function (Faker $faker) {
    return [
        'title' => $faker->realText(40),
        'description' => $faker->realText(300),
        'duration' => $faker->numberBetween(1, 300),
        'release_date' =>$faker->date('d-m-Y'),
        'cover_image' => $faker->imageUrl()
    ];
});
