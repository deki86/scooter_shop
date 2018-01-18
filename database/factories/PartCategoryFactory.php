<?php

use App\PartCategory;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(PartCategory::class, function (Faker $faker) {
    return [

        'name' => $faker->word,

    ];
});
