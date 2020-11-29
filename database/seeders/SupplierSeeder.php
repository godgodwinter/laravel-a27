<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create('id_ID');
        for($i = 1; $i <= 10; $i++){
            // insert data ke table products menggunakan Faker
            DB::table('suppliers')->insert([
              'nama' => $faker->name,
              'email' => $faker->email,
              'telp' => $faker->phoneNumber,
              'alamat' => $faker->address,
              'no_rek' => $faker->numberBetween(10,100),
              'nama_bank' => $faker->sentence(10),
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now()
             ]);
    }
}
}
