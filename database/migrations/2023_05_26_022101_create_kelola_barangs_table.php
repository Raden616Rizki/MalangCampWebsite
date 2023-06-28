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
        Schema::create('kelola_barangs', function (Blueprint $table) {

            $table->id('id_item');
            $table->string('nama_item')->nullable();
            $table->integer('stok')->nullable();
            $table->string('jenis')->nullable();
            $table->String('keterangan')->nullable();
            $table->integer('harga')->nullable();
            $table->string('gambar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelola_barangs');
    }
};
