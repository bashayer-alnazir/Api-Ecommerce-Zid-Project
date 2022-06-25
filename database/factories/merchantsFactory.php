<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\merchants;
use Faker\Generator as Faker;

$factory->define(merchants::class, function (Faker $faker) {

    return [
        'StoreName' => $faker->word,
        'ShippingCost' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
