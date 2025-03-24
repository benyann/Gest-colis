<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('colis_expedition', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('colis_id');
            $table->unsignedBigInteger('expedition_id');

            // Contraintes de clés étrangères
            $table->foreign('colis_id')->references('id')->on('colis')->onDelete('cascade');
            $table->foreign('expedition_id')->references('id')->on('expeditions')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('colis_expedition');
    }
};
