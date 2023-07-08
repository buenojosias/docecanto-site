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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->index();
            $table->string('title');
            $table->string('resume');
            $table->longText('lyrics');
            $table->longText('fulltext');
            $table->boolean('detached')->default(false);
            $table->timestamps();
        });

        Schema::create('category_song', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained();
            $table->foreignId('song_id')->constrained();
        });

        Schema::create('favorites', function (Blueprint $table) {
            $table->foreignId('song_id')->constrained();
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_song');
        Schema::dropIfExists('favorites');
        Schema::dropIfExists('songs');
    }
};
