<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\product_translation;
use Faker\Generator as Faker;

$factory->define(product_translation::class, function (Faker $faker) {

    return [
        'ProductId' => $faker->randomDigitNotNull,
        'Name' => $faker->word,
        'Description' => $faker->word,
        'Language' => $faker->word
    ];
});
