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
        Schema::table('salle', function (Blueprint $table) {
            $table->foreign(['id_etab'], 'fk_salle_etab')->references(['id_etab'])->on('etablissement')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('salle', function (Blueprint $table) {
            $table->dropForeign('fk_salle_etab');
        });
    }
};
