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
        Schema::table('centre', function (Blueprint $table) {
            $table->foreign(['id_etab'], 'fk_centre_etab')->references(['id_etab'])->on('etablissement')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('centre', function (Blueprint $table) {
            $table->dropForeign('fk_centre_etab');
        });
    }
};
