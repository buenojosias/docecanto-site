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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wallet_id')->constrained();
            $table->morphs('transactionable');
            $table->tinyText('description');
            $table->dateTime('datetime', $precision = 0);
            $table->string('method');
            $table->integer('amount');
            $table->integer('wallet_balance_before');
            $table->integer('wallet_balance_after');
            $table->integer('total_balance_before');
            $table->integer('total_balance_after');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
