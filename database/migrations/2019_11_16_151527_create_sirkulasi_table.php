<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSirkulasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sirkulasi', function (Blueprint $table) {
            $table->bigIncrements('sirkulasi_id');
            $table->unsignedbigInteger('anggota_id');
            $table->foreign('anggota_id')->references('anggota_id')->on('anggota')->onDelete('cascade');
            $table->unsignedbigInteger('biblio_id');
            $table->foreign('biblio_id')->references('biblio_id')->on('biblio')->onDelete('cascade');
            $table->unsignedbigInteger('aturan_id');
            $table->foreign('aturan_id')->references('aturan_id')->on('aturan')->onDelete('cascade');
            $table->date('mulai_pinjam')->nullable();
            $table->date('kembali_pinjam')->nullable();
            $table->date('perpanjangan')->nullable();
            $table->unsignedbigInteger('status_sirkulasi_id');
            $table->foreign('status_sirkulasi_id')->references('status_sirkulasi_id')->on('status_sirkulasi')->onDelete('cascade');
            $table->timestamp('pembuatan')->nullable();
            $table->timestamp('perubahan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sirkulasi');
    }
}
