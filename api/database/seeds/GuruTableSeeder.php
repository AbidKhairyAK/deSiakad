<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class GuruTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        for ($i=1; $i <= 10; $i++) { 
        	$data[$i] = [
                'id_agama' => $faker->boolean(80) ?: rand(2,5),
                'nik' => $faker->ean13,
                'nuptk' => $faker->ean13,
                'nama' => $faker->name(),
                'gender' => rand(0,1) ? 'L' : 'P',
                'foto' => 'logo.png',
                'status' => $faker->boolean(80),
        		'created_at' => $faker->date(),
        		'updated_at' => $faker->date(),
        	];
        }

        DB::table('guru')->truncate();
        DB::table('guru')->insert($data);
    }
}
