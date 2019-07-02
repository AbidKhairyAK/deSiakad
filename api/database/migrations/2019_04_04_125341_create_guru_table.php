<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedTinyInteger('id_agama');
            $table->string('nik', 16)->unique();
            $table->string('nuptk', 16)->unique()->nullable();
            $table->string('nama', 100);
            $table->enum('gender', ['L', 'P']);
            $table->string('foto', 20)->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('guru');
    }
}
