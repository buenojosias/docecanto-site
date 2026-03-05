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
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('balance_before');
            $table->string('type', 20)->after('date');
            $table->string('method', 20)->after('type');
            $table->decimal('balance_after', 9, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->decimal('balance_after', 9, 2)->nullable(false)->change();
            $table->decimal('balance_before', 9, 2)->nullable()->after('amount');
            $table->dropColumn('type');
            $table->dropColumn('method');
        });
    }
};
