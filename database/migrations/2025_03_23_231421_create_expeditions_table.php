<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('expeditions', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->date('date_expedition');
            $table->enum('creneau', ['matin', 'midi', 'soir']);

            // Clé étrangère agence
            $table->unsignedBigInteger('agence_id')->nullable();
            $table->foreign('agence_id')->references('id')->on('agences')->onDelete('set null');

            // Clé étrangère chauffeur
            $table->unsignedBigInteger('chauffeur_id')->nullable();
            $table->foreign('chauffeur_id')->references('id')->on('chauffeurs')->onDelete('set null');

            // Statut de l’expédition
            $table->enum('statut', ['en attente', 'en cours', 'terminée'])->default('en attente');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('expeditions');
    }
};
