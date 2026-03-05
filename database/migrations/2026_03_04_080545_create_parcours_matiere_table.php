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
        Schema::create('parcours_matiere', function (Blueprint $table) {
            $table->integer('id_parcours_matiere', true);
            $table->integer('coefficient');
            $table->integer('type_epreuve')->default(1);
            $table->integer('duree');
            $table->integer('dispense_cl')->default(0);
            $table->integer('id_matiere')->index('fk_pm_matiere');
            $table->integer('id_matiere_mere')->nullable();
            $table->integer('id_parcours')->index('fk_pm_parcours');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcours_matiere');
    }
};
