<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/siswa', 'SiswaController@index');
$router->get('/siswa/list', 'SiswaController@list');
$router->post('/siswa/create', 'SiswaController@create');
$router->post('/siswa/{id}/update', 'SiswaController@update');
$router->post('/siswa/{id}/add-foto', 'SiswaController@addFoto');
$router->delete('/siswa/{id}/destroy', 'SiswaController@destroy');

$router->get('/peserta-didik', 'PesertaDidikController@index');
$router->get('/peserta-didik/list', 'PesertaDidikController@list');
$router->get('/peserta-didik/punya-rombel', 'PesertaDidikController@punya_rombel');
$router->get('/peserta-didik/semua-siswa', 'PesertaDidikController@semua_siswa');
$router->post('/peserta-didik/push', 'PesertaDidikController@push');
$router->post('/peserta-didik/pop', 'PesertaDidikController@pop');

$router->get('/ruangan', 'RuanganController@index');
$router->get('/ruangan/list', 'RuanganController@list');
$router->post('/ruangan/create', 'RuanganController@create');
$router->post('/ruangan/{id}/update', 'RuanganController@update');
$router->delete('/ruangan/{id}/destroy', 'RuanganController@destroy');

$router->get('/mapel', 'MapelController@index');
$router->get('/mapel/list', 'MapelController@list');
$router->post('/mapel/create', 'MapelController@create');
$router->post('/mapel/{id}/update', 'MapelController@update');
$router->delete('/mapel/{id}/destroy', 'MapelController@destroy');

$router->get('/rombel', 'RombelController@index');
$router->get('/rombel/list', 'RombelController@list');
$router->post('/rombel/create', 'RombelController@create');
$router->post('/rombel/{id}/update', 'RombelController@update');
$router->delete('/rombel/{id}/destroy', 'RombelController@destroy');

$router->get('/tahun-akademik', 'TahunAkademikController@index');
$router->get('/tahun-akademik/list', 'TahunAkademikController@list');
$router->post('/tahun-akademik/create', 'TahunAkademikController@create');
$router->post('/tahun-akademik/{id}/update', 'TahunAkademikController@update');
$router->delete('/tahun-akademik/{id}/destroy', 'TahunAkademikController@destroy');

$router->get('/kurikulum', 'KurikulumController@index');
$router->get('/kurikulum/list', 'KurikulumController@list');
$router->post('/kurikulum/create', 'KurikulumController@create');
$router->post('/kurikulum/{id}/update', 'KurikulumController@update');
$router->delete('/kurikulum/{id}/destroy', 'KurikulumController@destroy');

$router->get('/angkatan', 'AngkatanController@index');
$router->get('/angkatan/list', 'AngkatanController@list');
$router->post('/angkatan/create', 'AngkatanController@create');
$router->post('/angkatan/{id}/update', 'AngkatanController@update');
$router->delete('/angkatan/{id}/destroy', 'AngkatanController@destroy');

$router->get('/guru', 'GuruController@index');
$router->get('/guru/list', 'GuruController@list');
$router->post('/guru/create', 'GuruController@create');
$router->post('/guru/{id}/update', 'GuruController@update');
$router->post('/guru/{id}/add-foto', 'GuruController@addFoto');
$router->delete('/guru/{id}/destroy', 'GuruController@destroy');

$router->get('/walikelas', 'WalikelasController@index');
$router->post('/walikelas/sync', 'WalikelasController@sync');

$router->get('/jadwal-editor', 'JadwalEditorController@index');
$router->post('/jadwal-editor/save', 'JadwalEditorController@save');
$router->post('/jadwal-editor/destroy', 'JadwalEditorController@destroy');

$router->get('/jadwal', 'JadwalController@index');
$router->post('/jadwal/create', 'JadwalController@create');
$router->post('/jadwal/{id}/update', 'JadwalController@update');
$router->delete('/jadwal/{id}/destroy', 'JadwalController@destroy');

$router->get('/jenis-pembayaran', 'JenisPembayaranController@index');
$router->get('/jenis-pembayaran/list', 'JenisPembayaranController@list');
$router->post('/jenis-pembayaran/create', 'JenisPembayaranController@create');
$router->post('/jenis-pembayaran/{id}/update', 'JenisPembayaranController@update');
$router->delete('/jenis-pembayaran/{id}/destroy', 'JenisPembayaranController@destroy');

$router->get('/pembayaran', 'PembayaranController@index');
$router->post('/pembayaran/create', 'PembayaranController@create');
$router->post('/pembayaran/{id}/update', 'PembayaranController@update');
$router->delete('/pembayaran/{id}/destroy', 'PembayaranController@destroy');

$router->get('/sekolah', 'SekolahController@index');
$router->post('/sekolah/save', 'SekolahController@save');

$router->post('/akun/check/{identity}', 'AkunController@check');
$router->post('/akun/register', 'AkunController@register');

$router->get('/menu', 'MenuController@index');

$router->get('/agama/list', 'AgamaController@list');
$router->get('/jam/list', 'JamController@list');
$router->get('/hari/list', 'HariController@list');

$router->get('/kurikulum-detail', 'KurikulumDetailController@index');
$router->get('/pengguna', 'PenggunaController@index');
