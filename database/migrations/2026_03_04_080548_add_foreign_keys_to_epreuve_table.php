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
        Schema::table('epreuve', function (Blueprint $table) {
            $table->foreign(['id_enseignant'], 'fk_ep_enseignant')->references(['id_enseignant'])->on('enseignant')->onUpdate('restrict')->onDelete('set null');
            $table->foreign(['id_parcours_matiere'], 'fk_ep_pm')->references(['id_parcours_matiere'])->on('parcours_matiere')->onUpdate('restrict')->onDelete('set null');
            $table->foreign(['id_salle'], 'fk_ep_salle')->references(['id_salle'])->on('salle')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('epreuve', function (Blueprint $table) {
            $table->dropForeign('fk_ep_enseignant');
            $table->dropForeign('fk_ep_pm');
            $table->dropForeign('fk_ep_salle');
        });
    }
};
