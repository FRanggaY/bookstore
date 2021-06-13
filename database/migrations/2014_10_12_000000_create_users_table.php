<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nama', 100);
            $table->string('alamat', 225);
            $table->string('telpon', 12);
            $table->string('status', 50);
            $table->string('username', 225)->unique();
            $table->string('password', 225);
            $table->rememberToken();
            $table->string('akses', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
