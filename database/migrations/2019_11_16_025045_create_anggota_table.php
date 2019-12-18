<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->bigIncrements('anggota_id');
            $table->string('anggota_nama', 100)->nullable();
            $table->smallInteger('jenis_kelamin')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->unsignedbigInteger('anggota_tipe_id');
            $table->foreign('anggota_tipe_id')->references('anggota_tipe_id')->on('anggota_tipe')->onDelete('cascade');
            $table->string('alamat', 255)->nullable();
            $table->unsignedbigInteger('provinsi_id')->nullable();
            $table->foreign('provinsi_id')->references('provinsi_id')->on('provinsi')->onDelete('cascade');
            $table->unsignedbigInteger('kabupaten_id')->nullable();
            $table->foreign('kabupaten_id')->references('kabupaten_id')->on('kabupaten')->onDelete('cascade');
            $table->unsignedbigInteger('kecamatan_id')->nullable();
            $table->foreign('kecamatan_id')->references('kecamatan_id')->on('kecamatan')->onDelete('cascade');
            $table->unsignedbigInteger('desa_id')->nullable();
            $table->foreign('desa_id')->references('desa_id')->on('desa')->onDelete('cascade');
            $table->string('kode_pos', 5)->nullable();
            $table->string('telepon', 15)->nullable();
            $table->string('whatsapp', 15)->nullable();
            $table->string('facebook', 255)->nullable();
            $table->string('instagram', 255)->nullable();
            $table->unsignedbigInteger('jurusan_id')->nullable();
            $table->foreign('jurusan_id')->references('jurusan_id')->on('jurusan')->onDelete('cascade');
            $table->unsignedbigInteger('kelas_id')->nullable();
            $table->foreign('kelas_id')->references('kelas_id')->on('kelas')->onDelete('cascade');
            $table->string('posel', 255)->nullable();
            $table->string('foto', 255)->default('default.jpg');
            $table->string('katasandi', 255)->nullable();
            $table->string('kode_konfirmasi')->nullable();
            $table->smallInteger('status_anggota')->nullable(); 
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
        Schema::dropIfExists('anggota');
    }
}
