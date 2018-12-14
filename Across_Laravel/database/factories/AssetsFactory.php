<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'post_parent_id' => $faker->numberBetween($min = 1, $max = 6),
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true) ,
        'description' => $faker->text,
        'date' => $faker->dateTime,
        'image' => $faker->imageUrl($width = 40, $height = 44),
        'first_li' => $faker->sentence($nbWords = 6, $variableNbWords = true) ,
        'second_li' => $faker->sentence($nbWords = 6, $variableNbWords = true) ,
        'posted_by' => $faker->email,
        'is_highlighted' => $faker->boolean,
    ];
});
