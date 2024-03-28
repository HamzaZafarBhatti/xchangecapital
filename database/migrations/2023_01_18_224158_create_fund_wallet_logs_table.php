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
        Schema::create('fund_wallet_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('ref_id');
            $table->float('requested_amount', 12, 2);
            $table->string('currency', 3);
            $table->float('converted_amount', 12, 2);
            $table->float('fee', 12, 2);
            $table->float('charged_amount', 12, 2);
            $table->integer('status');
            $table->string('transaction_id')->nullable();
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
        Schema::dropIfExists('fund_wallet_logs');
    }
};
