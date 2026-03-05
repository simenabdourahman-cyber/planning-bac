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
        Schema::create('salle', function (Blueprint $table) {
            $table->integer('id_salle', true);
            $table->string('code', 30);
            $table->string('intitule', 40);
            $table->integer('capacite');
            $table->string('type', 40);
            $table->integer('id_etab')->index('fk_salle_etab');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salle');
    }
};
