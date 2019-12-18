<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaturanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaturan', function (Blueprint $table) {
            $table->bigIncrements('pengaturan_id');
            $table->string('tentang_kami', 255)->nullable();
            $table->string('tempat', 255)->nullable();
            $table->unsignedbigInteger('operator');
            $table->foreign('operator')->references('anggota_id')->on('anggota')->onDelete('cascade');
            $table->datetime('operasional_awal')->nullable();
            $table->datetime('operasional_akhir')->nullable();
            $table->string('hak_cipta', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaturan');
    }
}
