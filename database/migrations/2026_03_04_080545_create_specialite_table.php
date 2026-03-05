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
        Schema::create('specialite', function (Blueprint $table) {
            $table->integer('id_specialite')->primary();
            $table->string('code', 25);
            $table->string('intitule', 75);
            $table->integer('id_serie')->index('fk_specialite_serie');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialite');
    }
};
