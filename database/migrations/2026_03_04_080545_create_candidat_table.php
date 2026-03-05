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
        Schema::create('candidat', function (Blueprint $table) {
            $table->integer('id_candidat')->primary();
            $table->string('matricule', 20);
            $table->string('nom', 40);
            $table->date('date_naissance');
            $table->char('genre', 1)->nullable();
            $table->string('Telephone', 40);
            $table->string('email', 40);
            $table->string('ville', 100);
            $table->string('pays', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidat');
    }
};
