<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class MapelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        $mapel = [
            'Ilmu Pengetahuan Alam',
            'Ilmu Pengetahuan Sosial',
            'Matematika',
            'Pendidikan Jasmani dan Kesehatan',
            'Bahasa Indonesia',
            'Bahasa Inggris',
            'Pendidikan Kewarganegaraan',
            'Pendidikan Agama Islam',
            'Bahasa Daerah',
            'Seni Budaya dan Keterampilan'
        ];
        $kode = [
            'IPA', 'IPS', 'MTK', 'PENJAS', 'BIND', 'BING', 'PPKN', 'PAI', 'BDAE', 'SBK' 
        ];

        for ($i=0; $i < 10; $i++) { 
        	$data[$i] = [
                'kode' => $kode[$i],
        		'nama' => $mapel[$i],
        		'created_at' => $faker->date(),
        		'updated_at' => $faker->date(),
        	];
        }

        DB::table('mapel')->truncate();
        DB::table('mapel')->insert($data);
    }
}
