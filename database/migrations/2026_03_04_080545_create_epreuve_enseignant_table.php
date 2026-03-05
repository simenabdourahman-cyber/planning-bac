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
        Schema::create('epreuve_enseignant', function (Blueprint $table) {
            $table->integer('id_epreuve_enseignant', true);
            $table->integer('id_enseignant')->index('fk_ee_enseignant');
            $table->integer('id_centre')->index('fk_ee_centre');
            $table->integer('id_parcours_matiere')->index('fk_ee_pm');
            $table->date('date_debut');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->integer('annee');

            $table->primary(['id_epreuve_enseignant', 'id_enseignant']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('epreuve_enseignant');
    }
};
