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
        Schema::table('referral_logs', function (Blueprint $table) {
            //
            $table->string('transfer_balance_log_ref_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('referral_logs', function (Blueprint $table) {
            //
            $table->dropColumn('transfer_balance_log_ref_id');
        });
    }
};
