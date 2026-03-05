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
        Schema::table('enseignant', function (Blueprint $table) {
            $table->foreign(['id_parcours_matiere'], 'fk_ens_pm')->references(['id_parcours_matiere'])->on('parcours_matiere')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enseignant', function (Blueprint $table) {
            $table->dropForeign('fk_ens_pm');
        });
    }
};
