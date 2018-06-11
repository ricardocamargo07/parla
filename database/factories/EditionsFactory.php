<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'year' => 2018,
        'month' => 2,
        'number' => 0,
        'published' => false,
    ];
});
