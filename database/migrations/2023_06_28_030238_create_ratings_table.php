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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained()->cascadeOnDelete();
            $table->integer('height')->nullable(); // Altura em centímetros
            $table->integer('tuning')->nullable(); // Afinação (1-5)
            $table->integer('vocal_power')->nullable(); // Potência vocal (1-5)
            $table->foreignId('lowest_note_id')->nullable()->constrained('notes');
            $table->foreignId('highest_note_id')->nullable()->constrained('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
