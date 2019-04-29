<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('id_rombel')->nullable();
            $table->unsignedTinyInteger('id_agama');
            $table->unsignedTinyInteger('id_tahun_akademik');
            $table->string('nim', 11)->unique();
            $table->string('nama', 50);
            $table->enum('gender', ['L', 'P']);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir', 30);
            $table->string('foto', 20)->nullable();
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
        Schema::dropIfExists('siswa');
    }
}
