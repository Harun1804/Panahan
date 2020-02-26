<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelatihTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelatih', function (Blueprint $table) {
            $table->string('id_pelatih', 6)->primary();
            $table->string('id_pengguna', 7)->index();
            $table->string('nama_pelatih',50);
            $table->string('nowa_pelatih',15);
            $table->foreign('id_pengguna')->references('id_pengguna')->on('akun_pengguna');
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
        Schema::dropIfExists('pelatih');
    }
}
