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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username');
            $table->string('phoneNumber');
            $table->string('address');
            $table->string('photo_profile')->nullable();
            $table->string('otp_code')->nullable();
            $table->datetime('otp_expired')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('username');
            $table->dropColumn('phoneNumber');
            $table->dropColumn('address');
            $table->dropColumn('photo_profile')->nullable();
            $table->dropColumn('otp_code')->nullable();
            $table->dropColumn('otp_expired')->nullable();
        });
    }
};
