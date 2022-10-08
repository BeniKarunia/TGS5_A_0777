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
        Schema::create('golongans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_golongan');
            $table->foreignId('pegawai_id');
            $table->integer('gaji_pokok');
            $table->integer('tunjangan_keluarga');
            $table->integer('tunjangan_transport');
            $table->integer('tunjangan_makan');
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
        Schema::dropIfExists('golongans');
    }
};
