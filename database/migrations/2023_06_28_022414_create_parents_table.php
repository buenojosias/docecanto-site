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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birth')->nullable();
            $table->string('profession')->nullable();
            $table->timestamps();
        });

        Schema::create('member_parent', function (Blueprint $table) {
            $table->foreignId('member_id')->constrained();
            $table->foreignId('parent_id')->constrained();
            $table->string('kinship');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_parent');
        Schema::dropIfExists('parents');
    }
};
