<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menu', function (Blueprint $table) {
            $table->foreign('submenu')->references('id')->on('menu');
        });

        Schema::table('siswa', function (Blueprint $table) {
            $table->foreign('id_rombel')->references('id')->on('rombel');
            $table->foreign('id_angkatan')->references('id')->on('angkatan');
            $table->foreign('id_agama')->references('id')->on('agama');
        });

        Schema::table('guru', function (Blueprint $table) {
            $table->foreign('id_agama')->references('id')->on('agama');
        });

        Schema::table('akun', function (Blueprint $table) {
            $table->foreign('id_guru')->references('id')->on('guru');
        });

        Schema::table('kurikulum_detail', function (Blueprint $table) {
            $table->foreign('id_kurikulum')->references('id')->on('kurikulum');
            $table->foreign('id_mapel')->references('id')->on('mapel');
        });

        Schema::table('jadwal', function (Blueprint $table) {
            $table->foreign('id_rombel')->references('id')->on('rombel');
            $table->foreign('id_mapel')->references('id')->on('mapel');
            $table->foreign('id_guru')->references('id')->on('guru');
            $table->foreign('id_ruangan')->references('id')->on('ruangan');
            $table->foreign('id_jam_mulai')->references('id')->on('jam');
            $table->foreign('id_jam_selesai')->references('id')->on('jam');
            $table->foreign('id_hari')->references('id')->on('hari');
        });

        Schema::table('walikelas', function (Blueprint $table) {
            $table->foreign('id_guru')->references('id')->on('guru');
            $table->foreign('id_rombel')->references('id')->on('rombel');
        });

        Schema::table('pembayaran', function (Blueprint $table) {
            $table->foreign('id_siswa')->references('id')->on('siswa');
            $table->foreign('id_jenis_pembayaran')->references('id')->on('jenis_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
