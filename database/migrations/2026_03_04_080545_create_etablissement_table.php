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
        Schema::create('etablissement', function (Blueprint $table) {
            $table->integer('id_etab')->primary();
            $table->string('code', 50);
            $table->string('code_matricule', 20)->nullable();
            $table->string('intitule', 50);
            $table->string('responsable', 50);
            $table->string('email', 500)->nullable();
            $table->integer('id_type_etab');
            $table->integer('id_niveau_ens');
            $table->integer('id_circonscription');
            $table->integer('telephone');
            $table->integer('bp')->nullable();
            $table->string('masque', 40)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablissement');
    }
};
