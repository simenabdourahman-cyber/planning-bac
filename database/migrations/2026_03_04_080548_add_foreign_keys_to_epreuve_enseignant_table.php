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
        Schema::table('epreuve_enseignant', function (Blueprint $table) {
            $table->foreign(['id_centre'], 'fk_ee_centre')->references(['id_centre'])->on('centre')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id_enseignant'], 'fk_ee_enseignant')->references(['id_enseignant'])->on('enseignant')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id_parcours_matiere'], 'fk_ee_pm')->references(['id_parcours_matiere'])->on('parcours_matiere')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('epreuve_enseignant', function (Blueprint $table) {
            $table->dropForeign('fk_ee_centre');
            $table->dropForeign('fk_ee_enseignant');
            $table->dropForeign('fk_ee_pm');
        });
    }
};
