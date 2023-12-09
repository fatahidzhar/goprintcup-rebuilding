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
        Schema::create('testimonis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_user');
            $table->longText('isi');
            $table->string('penilaian', 2);
            $table->date('tgl_tanggapan')->nullable();
            $table->string('tanggapan')->nullable();
            $table->date('tanggal');
            $table->string('status1')->default('0');
            $table->string('status2')->default('0');
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
        Schema::dropIfExists('testimonis');
    }
};
