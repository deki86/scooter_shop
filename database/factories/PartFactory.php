<?php

use App\Brand;
use App\Manufacturer;
use App\Part;
use App\PartSubcategory;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Part::class, function (Faker $faker) {

    $subcategory = PartSubcategory::all()->random();
    $manufacturer = Manufacturer::all()->random();
    $brand = Brand::all()->random();

    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween($min = 100, $max = 1000),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'description' => $faker->text($maxNbChars = 200),
        'status' => $faker->randomElement([Part::AVAILABLE_PRODUCT, Part::UNAVAILABLE_PRODUCT]),
        'quantity' => $faker->numberBetween(0, 10),

        'manufacturer_id' => $manufacturer->id,
        'brand_id' => $brand->id,
        'subcategories_id' => $subcategory->id,
    ];
});
