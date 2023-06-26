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
        Schema::create('kelola_barangs_paket', function (Blueprint $table) {
            $table->id('kelola_barangs_paket_id');
            $table->unsignedBigInteger('id_item');
            $table->unsignedBigInteger('paket_id');
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
        Schema::dropIfExists('kelola_barangs_pakets');
    }
};
