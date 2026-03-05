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
        Schema::create('centre_examen', function (Blueprint $table) {
            $table->integer('id_centre_examen', true);
            $table->integer('id_centre')->index('fk_ce_centre');
            $table->integer('id_examen')->index('fk_ce_examen');
            $table->integer('id_serie')->nullable()->index('fk_ce_serie');
            $table->integer('id_specialite')->nullable()->index('fk_ce_specialite');
            $table->integer('nb_candidat');
            $table->integer('repasse_antip');
            $table->integer('annee');
            $table->integer('ordre');
            $table->integer('session');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centre_examen');
    }
};
