<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            //
            $table->integer('sct_buy_time')->default(0);
            $table->integer('sct_convert_time')->default(0);
            $table->integer('usd_convert_time')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            //
            $table->dropColumn('sct_buy_time');
            $table->dropColumn('sct_convert_time');
            $table->dropColumn('usd_convert_time');
        });
    }
};
