<?php

use App\Brand;
use App\Manufacturer;
use App\Part;
use App\PartCategory;
use App\PartSubcategory;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //

        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        PartCategory::truncate();
        Brand::truncate();
        Manufacturer::truncate();
        PartSubcategory::truncate();
        Part::truncate();

        $usersQuantity = 500;
        $categoriesQuantity = 30;
        $subCategoriesQuantity = 200;
        $partQuantity = 1000;
        $brandQuantity = 20;
        $manufacturerQuantity = 50;

        factory(User::class, $usersQuantity)->create();
        factory(PartCategory::class, $categoriesQuantity)->create();
        factory(Brand::class, $brandQuantity)->create();
        factory(Manufacturer::class, $manufacturerQuantity)->create();

        factory(PartSubcategory::class, $subCategoriesQuantity)->create();
        factory(Part::class, $partQuantity)->create();

    }
}
