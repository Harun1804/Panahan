<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelatihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelatihan', function (Blueprint $table) {
            $table->string('id_pelatihan', 6)->primary();
            $table->string('id_pelatih', 6)->index();
            $table->string('id_member', 6)->index();
            $table->date('tgl_latihan');
            $table->integer('jarak_tembak');
            $table->integer('skor');
            $table->string('bulan',10);
            $table->foreign('id_pelatih')->references('id_pelatih')->on('pelatih');
            $table->foreign('id_member')->references('id_member')->on('member');
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
        Schema::dropIfExists('pelatihan');
    }
}
