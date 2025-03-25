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
            $table->string('nom');
            $table->date('date_expedition');
            $table->time('heure_expedition');
            $table->unsignedBigInteger('agence_depart_id');
            $table->unsignedBigInteger('agence_arrivee_id');
            $table->unsignedBigInteger('chauffeur_id')->nullable();
            $table->integer('nombre_colis')->default(0);
            $table->string('statut');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('agence_depart_id')->references('id')->on('agences')->onDelete('cascade');
            $table->foreign('agence_arrivee_id')->references('id')->on('agences')->onDelete('cascade');
            $table->foreign('chauffeur_id')->references('id')->on('chauffeurs')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('expeditions');
    }
};