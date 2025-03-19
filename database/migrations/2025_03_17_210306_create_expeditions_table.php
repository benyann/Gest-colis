<?php

use App\Models\Agence;
use App\Models\User;
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
        Schema::create('expeditions', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->dateTime('date_expedition');
            //$table->foreignId('chauffeur_id')->constrained('chauffeurs')->onDelete('cascade');
            //$table->foreignId('agence_arrived_id')->constrained('agences')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expeditions');
    }
};
