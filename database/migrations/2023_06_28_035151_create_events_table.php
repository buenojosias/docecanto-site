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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('local');
            $table->date('date');
            $table->time('time')->nullable();
            $table->text('description');
            $table->boolean('is_presentation');
            $table->timestamps();
        });

        Schema::create('event_member', function (Blueprint $table) {
            $table->foreignId('event_id')->constrained();
            $table->foreignId('member_id')->constrained();
            $table->enum('answer', ['Sim', 'Não', 'Talvez']);
            $table->timestamps();
        });

        Schema::create('event_song', function (Blueprint $table) {
            $table->foreignId('event_id')->constrained();
            $table->foreignId('song_id')->constrained();
            $table->integer('position')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_member');
        Schema::dropIfExists('event_song');
        Schema::dropIfExists('events');
    }
};
