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
        Schema::create('colis', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('description');
            $table->string('valeur');
            $table->string('poids');
            $table->string('destinataire_nom');
            $table->string('destinataire_telephone');
            $table->string('destinataire_adresse');
            $table->string('expediteur_nom');
            $table->string('expediteur_telephone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colis');
    }
};
