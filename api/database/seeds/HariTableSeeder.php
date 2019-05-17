<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class HariTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        $kurikulum = [
        	'Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu'
        ];

        for ($i=0; $i < count($kurikulum); $i++) { 
        	$data[$i] = [
                'nama' => $kurikulum[$i],
        		'created_at' => $faker->date(),
        		'updated_at' => $faker->date(),
        	];
        }

        DB::table('hari')->truncate();
        DB::table('hari')->insert($data);
    }
}
