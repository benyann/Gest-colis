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
        Schema::create('suivis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colis_id')->constrained()->OnDelete('cascade');
            //$table->foreignId('expedition_id')->constrained()->OnDelete('cascade');
            $table->enum('statut', ['en attente', 'en transit', 'livré', 'retourné']);
            $table->text('description')->nullable();
            $table->timestamp('date')->useCurrent();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suivis');
    }
};
