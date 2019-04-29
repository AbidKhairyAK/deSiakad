<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class SekolahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        $data = [
            'npsn' => rand(11111111, 99999999),
            'nama' => 'SDN '.rand(1, 200).' '.$faker->city,
            'alamat' => $faker->address,
            'email' => $faker->freeEmail,
            'telepon' => $faker->e164PhoneNumber,
    		'created_at' => $faker->date(),
    		'updated_at' => $faker->date(),
    	];

        DB::table('sekolah')->truncate();
        DB::table('sekolah')->insert($data);
    }
}
