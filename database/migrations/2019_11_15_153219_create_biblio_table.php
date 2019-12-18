<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiblioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biblio', function (Blueprint $table) {
            $table->bigIncrements('biblio_id'); 
            $table->text('judul')->nullable();
            $table->string('edisi', 50)->nullable();
            $table->unsignedbigInteger('penulis_id');
            $table->foreign('penulis_id')->references('penulis_id')->on('penulis')->onDelete('cascade');
            $table->string('isbn', 20)->nullable();
            $table->unsignedbigInteger('penerbit_id');
            $table->foreign('penerbit_id')->references('penerbit_id')->on('penerbit')->onDelete('cascade');
            $table->integer('harga_buku')->nullable();
            $table->year('penerbit_tahun')->nullable();
            $table->string('penerbit_tempat', 100)->nullable();
            $table->text('deskripsi', 255)->nullable();
            $table->unsignedbigInteger('tipekoleksi_id');
            $table->foreign('tipekoleksi_id')->references('tipekoleksi_id')->on('tipekoleksi')->onDelete('cascade');
            $table->unsignedbigInteger('klasifikasi_id');
            $table->foreign('klasifikasi_id')->references('klasifikasi_id')->on('klasifikasi')->onDelete('cascade');
            $table->string('gambar', 100)->default('default.jpg');
            $table->string('lampiran', 100)->nullable();
            $table->smallInteger('promosi')->nullable();
            $table->smallInteger('publik')->nullable();
            $table->string('panggil', 50)->nullable();
            $table->string('eksemplar', 15)->nullable();
            $table->unsignedbigInteger('status_item_id');
            $table->foreign('status_item_id')->references('status_item_id')->on('status_item')->onDelete('cascade');
            $table->unsignedbigInteger('sumber_item_id');
            $table->foreign('sumber_item_id')->references('sumber_item_id')->on('sumber_item')->onDelete('cascade');
            $table->smallInteger('terhapus')->nullable();
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
        Schema::dropIfExists('biblio');
    }
}
