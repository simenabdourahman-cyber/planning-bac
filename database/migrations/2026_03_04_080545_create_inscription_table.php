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
        Schema::create('inscription', function (Blueprint $table) {
            $table->integer('id_inscription')->primary();
            $table->integer('annee');
            $table->integer('id_candidat')->index('fk_insc_candidat');
            $table->integer('id_classe')->nullable()->index('fk_inscription_classe');
            $table->integer('id_examen')->index('fk_insc_examen');
            $table->integer('id_serie')->nullable()->index('fk_insc_serie');
            $table->integer('id_specialite')->nullable()->index('fk_insc_specialite');
            $table->string('num_examen', 20)->nullable();
            $table->string('anonymat', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscription');
    }
};
