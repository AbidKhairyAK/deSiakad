<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKurikulumDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kurikulum_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('id_kurikulum');
            $table->unsignedSmallInteger('id_mapel');
            $table->enum('kelas', ['1', '2', '3', '4', '5', '6']);
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
        Schema::dropIfExists('kurikulum_detail');
    }
}
