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
        Schema::table('inscription', function (Blueprint $table) {
            $table->foreign(['id_classe'], 'fk_inscription_classe')->references(['id_classe'])->on('classe')->onUpdate('restrict')->onDelete('set null');
            $table->foreign(['id_candidat'], 'fk_insc_candidat')->references(['id_candidat'])->on('candidat')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id_examen'], 'fk_insc_examen')->references(['id_examen'])->on('examen')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id_serie'], 'fk_insc_serie')->references(['id_serie'])->on('serie')->onUpdate('restrict')->onDelete('set null');
            $table->foreign(['id_specialite'], 'fk_insc_specialite')->references(['id_specialite'])->on('specialite')->onUpdate('restrict')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inscription', function (Blueprint $table) {
            $table->dropForeign('fk_inscription_classe');
            $table->dropForeign('fk_insc_candidat');
            $table->dropForeign('fk_insc_examen');
            $table->dropForeign('fk_insc_serie');
            $table->dropForeign('fk_insc_specialite');
        });
    }
};
