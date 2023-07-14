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
        Schema::create('queues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('child_name');
            $table->string('child_phone', 15)->nullable();
            $table->string('parent_name');
            $table->string('parent_phone', 15)->nullable();
            $table->integer('age');
            $table->string('church')->nullable();
            $table->enum('status', ['Pendente', 'Visualizado', 'Contactado', 'Participando', 'Desistiu']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queues');
    }
};
