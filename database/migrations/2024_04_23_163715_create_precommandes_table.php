<?php

use App\Models\Produit;
use App\Models\User;
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
        Schema::create('precommandes', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 250);
            $table->string('prenom', 250);
            $table->string('courriel', 250);
            $table->string('telephone', 250);
            $table->string('adresse', 250);
            $table->string('postal', 10);
            $table->string('pays', 250);
            $table->integer('quantite');
            $table->foreignIdFor(Produit::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('precommandes');
    }
};
