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
        Schema::create('encounters', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('encounter_member', function (Blueprint $table) {
            $table->foreignId('encounter_id')->constrained();
            $table->foreignId('member_id')->constrained();
            $table->enum('attendance', ['P','F','J']);
            $table->tinyText('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encounter_member');
        Schema::dropIfExists('encounters');
    }
};
