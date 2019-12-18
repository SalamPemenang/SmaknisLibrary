<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKecamatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->bigIncrements('kecamatan_id');
            $table->string('kecamatan_nama', 100)->nullable();
            $table->unsignedbigInteger('kabupaten_id');
            $table->foreign('kabupaten_id')->references('kabupaten_id')->on('kabupaten')->onDelete('cascade');
            $table->unsignedbigInteger('provinsi_id');
            $table->foreign('provinsi_id')->references('provinsi_id')->on('provinsi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kecamatan');
    }
}
