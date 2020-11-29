<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class productUnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 10; $i++){
            // insert data ke table products menggunakan Faker
            DB::table('product_units')->insert([
              'nama' => $faker->stateAbbr,
              'kepanjangan' => $faker->citySuffix
             ]);
    }
    }
}
