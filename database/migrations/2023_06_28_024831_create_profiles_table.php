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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->enum('datatype', ['integer', 'string', 'boolean', 'date', 'time']);
        });

        Schema::create('member_profile', function (Blueprint $table) {
            $table->foreignId('member_id')->constrained();
            $table->foreignId('profile_id')->constrained();
            $table->string('answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_profile');
        Schema::dropIfExists('profiles');
    }
};
