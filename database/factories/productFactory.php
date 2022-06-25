<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\product;
use Faker\Generator as Faker;

$factory->define(product::class, function (Faker $faker) {

    return [
        'Price' => $faker->word,
        'Vat' => $faker->word,
        'IsTaxable' => $faker->word,
        'MerchantId' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
