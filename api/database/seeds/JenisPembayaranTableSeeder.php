<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class JenisPembayaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        $nama = [
            'Sumbangan Pembinaan Pendidikan',
            'Pembayaran Kegiatan Ekstrakulikuler',
        ];
        $kode = [
            'SPP', 'PKEKS'
        ];

        for ($i=0; $i < 2; $i++) { 
        	$data[$i] = [
                'kode' => $kode[$i],
                'nama' => $nama[$i],
        		'created_at' => $faker->date(),
        		'updated_at' => $faker->date(),
        	];
        }

        DB::table('jenis_pembayaran')->truncate();
        DB::table('jenis_pembayaran')->insert($data);
    }
}
