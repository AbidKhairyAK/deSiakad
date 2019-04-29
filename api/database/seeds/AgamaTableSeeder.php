<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class AgamaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        $agama = ['Islam', 'Kristen', 'Katholik', 'Hindu', 'Budha'];

        for ($i=0; $i < 5; $i++) { 
        	$data[$i] = [
        		'nama' => $agama[$i],
        		'created_at' => $faker->date(),
        		'updated_at' => $faker->date(),
        	];
        }

        DB::table('agama')->truncate();
        DB::table('agama')->insert($data);
    }
}
