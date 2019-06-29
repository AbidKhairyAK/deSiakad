<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class PenggunaTableSeeder extends Seeder
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
                'id_guru' => $i % 2 ? $i : null,
                'nama' => $faker->name(),
                'email' => $faker->freeEmail,
                'password' => app('hash')->make('secret'),
        		'created_at' => $faker->date(),
        		'updated_at' => $faker->date(),
        	];
        }

        DB::table('pengguna')->truncate();
        DB::table('pengguna')->insert($data);
    }
}
