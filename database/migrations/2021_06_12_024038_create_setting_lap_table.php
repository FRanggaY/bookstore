<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingLapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_setting_lap', function (Blueprint $table) {
            $table->id('id_setting');
            $table->string('nama_perusahaan',50);
            $table->string('alamat',100);
            $table->string('no_tlpn',12);
            $table->string('web',20);
            $table->string('logo',100);
            $table->string('no_hp',12);
            $table->string('email',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_setting_lap');
    }
}
