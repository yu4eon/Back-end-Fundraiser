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
        Schema::create('nouvelles', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 100);
            $table->text('contenu');
            $table->string('url', 500)->nullable();
            $table->string('auteur', 100);
            $table->date('date_publication');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nouvelles');
    }
};
