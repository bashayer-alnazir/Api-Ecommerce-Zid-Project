<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\shoppingCart;
use Faker\Generator as Faker;

$factory->define(shoppingCart::class, function (Faker $faker) {

    return [
        'ProductId' => $faker->randomDigitNotNull,
        'UserId' => $faker->randomDigitNotNull,
        'Quantity' => $faker->randomDigitNotNull
    ];
});
