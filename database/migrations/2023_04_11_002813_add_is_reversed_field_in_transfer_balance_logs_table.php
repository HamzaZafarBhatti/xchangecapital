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
        Schema::table('transfer_balance_logs', function (Blueprint $table) {
            //
            $table->boolean('is_reversed')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transfer_balance_logs', function (Blueprint $table) {
            //
            $table->dropColumn('is_reversed');
        });
    }
};
