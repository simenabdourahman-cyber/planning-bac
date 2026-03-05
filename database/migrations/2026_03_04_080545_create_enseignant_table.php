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
        Schema::create('enseignant', function (Blueprint $table) {
            $table->integer('id_enseignant', true);
            $table->string('matricule_ens', 15);
            $table->string('nom_ens', 50);
            $table->string('role_ens', 50);
            $table->string('flagsurv', 3);
            $table->integer('id_parcours_matiere')->index('fk_ens_pm');
            $table->string('etab', 35);
            $table->string('centre', 35);
            $table->date('date_debut');
            $table->date('date_fin');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->integer('annee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseignant');
    }
};
