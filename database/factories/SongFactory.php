<?php

use Faker\Generator as Faker;

$factory->define(App\Song::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(10),
        'artist' => $faker->name,
        'rating' => $faker->numberBetween(0,5),
        'album_id' => $faker->numberBetween(0,3),
    ];
});
