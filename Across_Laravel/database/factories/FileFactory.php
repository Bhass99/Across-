<?php

use Faker\Generator as Faker;

$factory->define(App\File::class, function (Faker $faker) {
    return [
        'parent_id' => $faker->numberBetween($min = 1, $max = 100),
        'languages' => $faker->randomElement($array = array ('nl','de','it','es','en')),
        'parent_id' => $faker->numberBetween($min = 1, $max = 100),

    ];
});
