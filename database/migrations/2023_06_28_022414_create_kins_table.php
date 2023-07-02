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
        Schema::create('kins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birth')->nullable();
            $table->string('profession')->nullable();
            $table->timestamps();
        });

        Schema::create('kin_member', function (Blueprint $table) {
            $table->foreignId('kin_id')->constrained('kins');
            $table->foreignId('member_id')->constrained();
            $table->string('kinship');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kin_member');
        Schema::dropIfExists('kins');
    }
};
