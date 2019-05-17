<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class AngkatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        $tahun_masuk = 2010;
        $tahun_keluar = 2016;

        for ($i=0; $i < 10; $i++) { 
        	$data[$i] = [
                'tahun' => ($tahun_masuk + $i) . '-' . ($tahun_keluar + $i),
                'status' => $i >= 4 ? 1 : 0,
        		'created_at' => $faker->date(),
        		'updated_at' => $faker->date(),
        	];
        }

        DB::table('angkatan')->truncate();
        DB::table('angkatan')->insert($data);
    }
}
