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
        Schema::create('epreuve', function (Blueprint $table) {
            $table->integer('id_epreuve', true);
            $table->integer('id_salle')->index('fk_ep_salle');
            $table->integer('id_enseignant')->nullable()->index('fk_ep_enseignant');
            $table->integer('id_parcours_matiere')->nullable()->index('fk_ep_pm');
            $table->date('date');
            $table->time('heure_debut');
            $table->time('heure_fin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('epreuve');
    }
};
