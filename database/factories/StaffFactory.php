<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Person;
use App\Models\Staff;
use Faker\Generator as Faker;

$factory->define(Staff::class, function (Faker $faker) {
    $person = factory(Person::class)->make()->toArray();
    return array_merge($person, [
        'bio' => $faker->realText(400),
    ]);
});
