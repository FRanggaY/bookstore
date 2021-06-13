<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_penjualan', function (Blueprint $table) {
            $table->string('id_penjualan',100);
            $table->string('id_buku',100);
            $table->integer('id_kasir');
            $table->integer('jumlah_beli');
            $table->integer('bayar');
            $table->integer('kembalian');
            $table->integer('total_harga');
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
        Schema::dropIfExists('tbl_penjualan');
    }
}
