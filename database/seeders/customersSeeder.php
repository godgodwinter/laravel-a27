<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class customersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 150; $i++){
            // insert data ke table products menggunakan Faker
            DB::table('customers')->insert([
              'name' => $faker->name,
              'nik' => $faker->unique()->randomNumber,
              'customers_categories_id' => $faker->numberBetween(1,12),
              'phone' => $faker->phoneNumber,
              'address' => $faker->address,
             ]);
    }
    }
}
