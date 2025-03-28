<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('colis', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->text('description')->nullable();
            $table->decimal('valeur', 10, 2)->default(0);
            $table->decimal('poids', 8, 2);

            // Informations destinataire
            $table->string('destinataire_nom');
            $table->string('destinataire_telephone');
            $table->string('destinataire_adresse');

            // Informations expéditeur
            $table->string('expediteur_nom');
            $table->string('expediteur_telephone');
            $table->string('expediteur_adresse');

            // Lien avec l'expédition
            $table->unsignedBigInteger('expedition_id');

            $table->timestamps();

            // Foreign Key
            $table->foreign('expedition_id')
                ->references('id')->on('expeditions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('colis');
    }
};
