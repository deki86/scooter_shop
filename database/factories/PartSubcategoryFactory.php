<?php

use App\PartCategory;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\PartSubcategory::class, function (Faker $faker) {

    $category = PartCategory::all()->random();

    return [
        'name' => $faker->name,
        'categories_id' => $category->id,
    ];
});
