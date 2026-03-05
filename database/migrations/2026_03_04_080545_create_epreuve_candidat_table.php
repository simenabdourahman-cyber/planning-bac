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
        Schema::create('epreuve_candidat', function (Blueprint $table) {
            $table->integer('id_epreuve');
            $table->integer('id_inscription')->index('fk_ec_inscription');
            $table->date('date')->nullable();
            $table->time('heure_debut')->nullable();
            $table->time('heure_fin')->nullable();
            $table->integer('repasse_antip')->default(0);

            $table->primary(['id_epreuve', 'id_inscription', 'repasse_antip']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('epreuve_candidat');
    }
};
