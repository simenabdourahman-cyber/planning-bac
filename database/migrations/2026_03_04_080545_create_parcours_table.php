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
        Schema::create('parcours', function (Blueprint $table) {
            $table->integer('id_parcours', true);
            $table->string('code', 40);
            $table->string('intitule', 60);
            $table->char('actif', 1);
            $table->integer('id_examen')->index('fk_parcours_examen');
            $table->integer('id_serie')->nullable()->index('fk_parcours_serie');
            $table->integer('id_specialite')->nullable()->index('fk_parcours_specialite');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcours');
    }
};
