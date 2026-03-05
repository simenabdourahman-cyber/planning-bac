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
        Schema::create('centre', function (Blueprint $table) {
            $table->integer('id_centre', true);
            $table->string('code', 10);
            $table->string('intitule', 100);
            $table->string('type', 50);
            $table->integer('id_etab')->index('id_etab');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centre');
    }
};
