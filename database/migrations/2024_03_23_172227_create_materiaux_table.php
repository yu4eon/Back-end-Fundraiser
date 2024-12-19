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
        Schema::create('materiaux', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 250);
            $table->string('caracteristique1', 500);
            $table->string('caracteristique2', 500)->nullable();
            $table->string('caracteristique3', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiaux');
    }
};
