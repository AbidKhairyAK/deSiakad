<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('id_rombel');
            $table->unsignedSmallInteger('id_mapel');
            $table->unsignedSmallInteger('id_guru');
            $table->unsignedSmallInteger('id_ruangan');
            $table->unsignedSmallInteger('id_jam_pelajaran');
            $table->enum('hari', ['1', '2', '3', '4', '5', '6', '7']);
            $table->enum('semester', ['1', '2']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal');
    }
}
