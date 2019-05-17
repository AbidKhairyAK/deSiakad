<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class TahunAkademikTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        $tahun_akademik = [
            '2010/2011',
            '2011/2012',
            '2012/2013',
            '2013/2014',
            '2014/2015',
            '2015/2016',
            '2016/2017',
            '2017/2018',
            '2018/2019',
            '2019/2020',
        ];

        for ($i=0; $i < 10; $i++) { 
        	$data[$i] = [
                'tahun' => $tahun_akademik[$i],
                'status' => $i == 8,
        		'created_at' => $faker->date(),
        		'updated_at' => $faker->date(),
        	];
        }

        DB::table('tahun_akademik')->truncate();
        DB::table('tahun_akademik')->insert($data);
    }
}
