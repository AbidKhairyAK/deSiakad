<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class PembayaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        for ($i=1; $i <= 200; $i++) { 
        	$type = $i > 100 ? 1 : 2;
        	$data[$i] = [
                'id_siswa' => $i % 100,
                'id_jenis_pembayaran' => $type,
                'tanggal' => $faker->date(),
                'jumlah' => $type == 1 ? 200000 : 50000,
                'keterangan' => $faker->sentence(),
        		'created_at' => $faker->date(),
        		'updated_at' => $faker->date(),
        	];
        }

        DB::table('pembayaran')->truncate();
        DB::table('pembayaran')->insert($data);
    }
}
