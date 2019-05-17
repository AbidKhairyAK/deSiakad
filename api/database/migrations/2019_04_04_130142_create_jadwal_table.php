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
            $table->unsignedSmallInteger('id_guru')->nullable();
            $table->unsignedSmallInteger('id_ruangan')->nullable();
            $table->unsignedTinyInteger('id_jam_mulai');
            $table->unsignedTinyInteger('id_jam_selesai');
            $table->unsignedTinyInteger('id_hari');
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
