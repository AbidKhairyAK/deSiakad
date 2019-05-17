<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalikelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // PERBAIKI SISTEM WALIKELAS DAN GURU
        Schema::create('walikelas', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('id_guru');
            $table->unsignedSmallInteger('id_rombel');
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
        Schema::dropIfExists('walikelas');
    }
}
