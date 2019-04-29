<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class KurikulumTableSeeder extends Seeder
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
            'Kurikulum 2010',
            'Kurikulum 2012',
            'Kurikulum 2014',
            'Kurikulum 2016',
            'Kurikulum 2018',
        ];

        for ($i=0; $i < 5; $i++) { 
        	$data[$i] = [
                'nama' => $kurikulum[$i],
                'status' => rand(0,1),
        		'created_at' => $faker->date(),
        		'updated_at' => $faker->date(),
        	];
        }

        DB::table('kurikulum')->truncate();
        DB::table('kurikulum')->insert($data);
    }
}
