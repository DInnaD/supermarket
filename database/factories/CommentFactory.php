<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment' => $faker->text($maxNbChars = 200),
        'rating' => $faker->numberBetween(1, 5),
        'product' => $faker->numberBetween(1, 200),
        'user_id' => $faker->numberBetween(1, 20),
        'product_id' => $faker->numberBetween(1, 100),
    ];
});
