<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(SupplierSeeder::class);
        $this->call(productCategoriesSeeder::class);
        $this->call(productUnitsSeeder::class);
        $this->call(customersCategoriessSeeder::class);
        $this->call(customersSeeder::class);
    }
}
