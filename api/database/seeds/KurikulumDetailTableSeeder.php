<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class KurikulumDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        for ($kelas=1; $kelas <= 6; $kelas++) { 
            
            $faker = Factory::create('id_ID'); 
            for ($i=0; $i < 6; $i++) {    
            	$data[] = [
                    'id_kurikulum' => rand(1, 5),
                    'id_mapel' => $faker->unique()->randomDigit,
                    'kelas' => $kelas,
            		'created_at' => $faker->date(),
            		'updated_at' => $faker->date(),
            	];
            }
        }

        DB::table('kurikulum_detail')->truncate();
        DB::table('kurikulum_detail')->insert($data);
    }
}
