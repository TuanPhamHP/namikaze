<?php

use Illuminate\Database\Seeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\ProductCategorySeeder;
use Database\Seeders\ProductStatusSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BrandSeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(ProductStatusSeeder::class);
        // $this->call(UserSeeder::class);
    }
}
