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
        Schema::table('parcours_matiere', function (Blueprint $table) {
            $table->foreign(['id_matiere'], 'fk_pm_matiere')->references(['id_matiere'])->on('matiere')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id_parcours'], 'fk_pm_parcours')->references(['id_parcours'])->on('parcours')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parcours_matiere', function (Blueprint $table) {
            $table->dropForeign('fk_pm_matiere');
            $table->dropForeign('fk_pm_parcours');
        });
    }
};
