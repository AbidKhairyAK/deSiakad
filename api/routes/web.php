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

$router->get('/menu', 'MenuController@index');

$router->get('/agama', 'AgamaController@index');

$router->get('/tahun-akademik', 'TahunAkademikController@index');

$router->get('/rombel', 'RombelController@index');

$router->get('/guru', 'GuruController@index');
$router->get('/jadwal', 'JadwalController@index');
$router->get('/kurikulum', 'KurikulumController@index');
$router->get('/kurikulum-detail', 'KurikulumDetailController@index');
$router->get('/mapel', 'MapelController@index');
$router->get('/mapel-sekolah', 'MapelSekolahController@index');
$router->get('/pengguna', 'PenggunaController@index');
$router->get('/ruangan', 'RuanganController@index');
$router->get('/sekolah', 'SekolahController@index');
$router->get('/walikelas', 'WalikelasController@index');