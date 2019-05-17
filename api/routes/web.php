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
$router->get('/siswa/peserta-didik', 'SiswaController@pesertaDidik');
$router->post('/siswa/create', 'SiswaController@create');
$router->post('/siswa/{id}/update', 'SiswaController@update');
$router->post('/siswa/{id}/add-foto', 'SiswaController@addFoto');
$router->delete('/siswa/{id}/destroy', 'SiswaController@destroy');

$router->get('/peserta-didik', 'PesertaDidikController@index');
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

$router->get('/jadwal-editor', 'JadwalEditorController@index');
$router->post('/jadwal-editor/save', 'JadwalEditorController@save');
$router->post('/jadwal-editor/destroy', 'JadwalEditorController@destroy');

$router->get('/menu', 'MenuController@index');

$router->get('/agama/list', 'AgamaController@list');
$router->get('/jam/list', 'JamController@list');
$router->get('/hari/list', 'HariController@list');

$router->get('/guru', 'GuruController@index');
$router->get('/jadwal', 'JadwalController@index');
$router->get('/kurikulum-detail', 'KurikulumDetailController@index');
$router->get('/pengguna', 'PenggunaController@index');
$router->get('/sekolah', 'SekolahController@index');
$router->get('/walikelas', 'WalikelasController@index');