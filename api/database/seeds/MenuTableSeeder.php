<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            // Parents
        	[
                'nama' => 'Beranda',
                'link' => '/beranda',
                'icon' => 'fa-home',
                'submenu' => 0
            ],
            [
                'nama' => 'Data Sekolah',
                'link' => '/sekolah',
                'icon' => 'fa-building',
                'submenu' => 0
            ],
            [
        		'nama' => 'Data Master',
        		'link' => '#',
                'icon' => 'fa-bars',
                'submenu' => 0
            ],
            [
                'nama' => 'Data Siswa',
                'link' => '#',
                'icon' => 'fa-users',
                'submenu' => 0
            ],
            [
                'nama' => 'Data Guru',
                'link' => '#',
                'icon' => 'fa-graduation-cap',
                'submenu' => 0
            ],
        	[
        		'nama' => 'Jadwal Pelajaran',
        		'link' => '/jadwal',
        		'icon' => 'fa-calendar',
        		'submenu' => 0
        	],
            [
                'nama' => 'Laporan Nilai',
                'link' => '/laporan',
                'icon' => 'fa-file-excel',
                'submenu' => 0
            ],
            [
                'nama' => 'Pembayaran',
                'link' => '#',
                'icon' => 'fa-money-bill-wave',
                'submenu' => 0
            ],
            [
                'nama' => 'Kirim Pesan',
                'link' => '#',
                'icon' => 'fa-envelope',
                'submenu' => 0
            ],
            [
                'nama' => 'Editor',
                'link' => '#',
                'icon' => 'fa-edit',
                'submenu' => 0
            ],
            [
                'nama' => 'Konfigurasi',
                'link' => '#',
                'icon' => 'fa-cog',
                'submenu' => 0
            ],

            // Childs
            [
                'nama' => 'Mata Pelajaran',
                'link' => '/mapel',
                'icon' => 'fa-book',
                'submenu' => 3
            ],
            [
                'nama' => 'Ruangan Kelas',
                'link' => '/ruangan',
                'icon' => 'fa-building',
                'submenu' => 3
            ],
            [
                'nama' => 'Tahun Akademik',
                'link' => '/tahun-akademik',
                'icon' => 'fa-calendar-alt',
                'submenu' => 3
            ],
            [
                'nama' => 'Angkatan',
                'link' => '/angkatan',
                'icon' => 'fa-list-alt',
                'submenu' => 3
            ],
            [
                'nama' => 'Rombongan Belajar',
                'link' => '/rombel',
                'icon' => 'fa-users',
                'submenu' => 3
            ],
            [
                'nama' => 'Kurikulum',
                'link' => '/kurikulum',
                'icon' => 'fa-newspaper',
                'submenu' => 3
            ],
            [
                'nama' => 'Peserta Didik',
                'link' => '/peserta-didik',
                'icon' => 'fa-pencil-alt',
                'submenu' => 4
            ],
            [
                'nama' => 'Seluruh Siswa',
                'link' => '/siswa',
                'icon' => 'fa-users',
                'submenu' => 4
            ],
            [
                'nama' => 'Walikelas',
                'link' => '/walikelas',
                'icon' => 'fa-users',
                'submenu' => 5
            ],
            [
                'nama' => 'Seluruh Guru',
                'link' => '/guru',
                'icon' => 'fa-graduation-cap',
                'submenu' => 5
            ],
            [
                'nama' => 'Data Pembayaran',
                'link' => '/pembayaran',
                'icon' => 'fa-money-check-alt',
                'submenu' => 8
            ],
            [
                'nama' => 'Jenis Pembayaran',
                'link' => '/jenis-pembayaran',
                'icon' => 'fa-dollar-sign',
                'submenu' => 8
            ],
            [
                'nama' => 'Form Pesan',
                'link' => '/form-pesan',
                'icon' => 'fa-comments',
                'submenu' => 9
            ],
            [
                'nama' => 'Template Pesan',
                'link' => '/template-pesan',
                'icon' => 'fa-sticky-note',
                'submenu' => 9
            ],
            [
                'nama' => 'Kontak',
                'link' => '/kontak',
                'icon' => 'fa-address-book',
                'submenu' => 9
            ],
            [
                'nama' => 'Grup Kontak',
                'link' => '/grup-kontak',
                'icon' => 'fa-layer-group',
                'submenu' => 9
            ],
            [
                'nama' => 'Peserta Didik Editor',
                'link' => '/peserta-didik-editor',
                'icon' => 'fa-pencil-alt',
                'submenu' => 10
            ],
            [
                'nama' => 'Jadwal Pelajaran Editor',
                'link' => '/jadwal-pelajaran-editor',
                'icon' => 'fa-calendar',
                'submenu' => 10
            ],
            [
                'nama' => 'Pengguna Sistem',
                'link' => '/pengguna',
                'icon' => 'fa-cubes',
                'submenu' => 11
            ],
            [
                'nama' => 'Hak Akses',
                'link' => '/hak-akses',
                'icon' => 'fa-lock',
                'submenu' => 11
            ],
        ];

        DB::table('menu')->truncate();
        DB::table('menu')->insert($data);
    }
}
