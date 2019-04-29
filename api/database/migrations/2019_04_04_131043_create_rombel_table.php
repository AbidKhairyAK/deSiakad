<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRombelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rombel', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('kode', 10);
            $table->string('nama', 50);
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
        Schema::dropIfExists('rombel');
    }
}
