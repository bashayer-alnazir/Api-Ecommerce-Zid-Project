<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\cart;
use Faker\Generator as Faker;

$factory->define(cart::class, function (Faker $faker) {

    return [
        'ProductId' => $faker->randomDigitNotNull,
        'UserId' => $faker->word,
        'Quantity' => $faker->randomDigitNotNull,
        'deleted_at' => $faker->word
    ];
});
