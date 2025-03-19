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
        Schema::create('paiement_expedition', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expedition_id')->constrained()->OnDelete('cascade');
            $table->foreignId('paiement_id')->constrained()->OnDelete('cascade');
            $table->enum('status', ['en attente', 'payé', 'annulé'])->default('en attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiement_expedition');
    }
};
