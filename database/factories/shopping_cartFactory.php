<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\shopping_cart;
use Faker\Generator as Faker;

$factory->define(shopping_cart::class, function (Faker $faker) {

    return [
        'ProductId' => $faker->randomDigitNotNull,
        'UserId' => $faker->word,
        'Quantity' => $faker->randomDigitNotNull
    ];
});
