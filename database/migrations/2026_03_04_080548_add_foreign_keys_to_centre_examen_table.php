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
        Schema::table('centre_examen', function (Blueprint $table) {
            $table->foreign(['id_centre'], 'fk_ce_centre')->references(['id_centre'])->on('centre')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id_examen'], 'fk_ce_examen')->references(['id_examen'])->on('examen')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id_serie'], 'fk_ce_serie')->references(['id_serie'])->on('serie')->onUpdate('restrict')->onDelete('set null');
            $table->foreign(['id_specialite'], 'fk_ce_specialite')->references(['id_specialite'])->on('specialite')->onUpdate('restrict')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('centre_examen', function (Blueprint $table) {
            $table->dropForeign('fk_ce_centre');
            $table->dropForeign('fk_ce_examen');
            $table->dropForeign('fk_ce_serie');
            $table->dropForeign('fk_ce_specialite');
        });
    }
};
