<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('agences', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT
            $table->string('nom');
            $table->string('adresse');
            $table->string('telephone');
            $table->timestamps(); // created_at et updated_at
        });
    }

    public function down(): void {
        Schema::dropIfExists('agences');
    }
};
