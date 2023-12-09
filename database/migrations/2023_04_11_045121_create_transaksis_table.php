<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('id_transaksi');
            $table->string('no_hp')->nullable();
            $table->string('users_id')->nullable();
            $table->string('nama')->nullable();
            $table->longText('alamat')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('harga')->nullable();
            $table->string('harga_discount')->nullable();
            $table->string('discount')->nullable();
            $table->string('status', 2)->default('0');
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
        Schema::dropIfExists('transaksis');
    }
};
