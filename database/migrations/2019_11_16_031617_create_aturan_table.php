<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAturanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aturan', function (Blueprint $table) {
            $table->bigIncrements('aturan_id');
            $table->unsignedbigInteger('anggota_tipe_id');
            $table->foreign('anggota_tipe_id')->references('anggota_tipe_id')->on('anggota_tipe')->onDelete('cascade');
            $table->string('jumlah')->nullable();
            $table->integer('periode')->nullable();
            $table->integer('kali_pinjam')->nullable();
            $table->integer('denda')->nullable();
            $table->integer('toleransi')->nullable();
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
        Schema::dropIfExists('aturan');
    }
}
