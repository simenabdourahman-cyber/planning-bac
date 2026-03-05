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
        Schema::table('epreuve_candidat', function (Blueprint $table) {
            $table->foreign(['id_epreuve'], 'fk_ec_epreuve')->references(['id_epreuve'])->on('epreuve')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id_inscription'], 'fk_ec_inscription')->references(['id_inscription'])->on('inscription')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('epreuve_candidat', function (Blueprint $table) {
            $table->dropForeign('fk_ec_epreuve');
            $table->dropForeign('fk_ec_inscription');
        });
    }
};
