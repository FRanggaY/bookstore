<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_buku', function (Blueprint $table) {
            $table->id('id_buku');
            $table->string('judul',225);
            $table->string('noisbn',100);
            $table->string('penulis',100);
            $table->string('penerbit',100);
            $table->integer('tahun');
            $table->integer('stok')->nullable();
            $table->integer('harga_pokok');
            $table->integer('harga_jual');
            $table->integer('ppn')->nullable();
            $table->integer('diskon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book');
    }
}
