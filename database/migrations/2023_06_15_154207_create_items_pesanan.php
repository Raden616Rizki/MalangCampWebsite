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
        Schema::create('items_pesanan', function (Blueprint $table) {
            $table->id('items_pesanan_id');
            $table->unsignedBigInteger('items_id');
            $table->foreign('items_id')->references('id_item')->on('kelola_barangs');
            $table->unsignedBigInteger('pesanan_id');
            $table->foreign('pesanan_id')->references('pesanan_id')->on('pesanan');
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
        Schema::dropIfExists('items_pesanan');
    }
};
