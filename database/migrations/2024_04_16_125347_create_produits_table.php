<?php

use App\Models\Materiel;
use App\Models\Palier;
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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 250);
            $table->decimal('prix', 10, 2);
            $table->decimal('taille', 5, 2);
            $table->decimal('poids', 5, 2);
            $table->string('mot_inspiration', 50);
            
            $table->string('avantage1', 500);
            $table->string('avantage2', 500)->nullable();
            $table->string('avantage3', 500)->nullable();
            $table->string('avantage4', 500)->nullable();
            
            $table->string('caracteristique1', 500);
            $table->string('caracteristique2', 500)->nullable();
            $table->string('caracteristique3', 500)->nullable();
            $table->string('caracteristique4', 500)->nullable();
            
            $table->string('specification1', 500);
            $table->string('specification2', 500)->nullable();
            $table->string('specification3', 500)->nullable();
            $table->string('specification4', 500)->nullable();
            
            $table->date('date_sortie');
            $table->text('description');
            $table->foreignIdFor(Materiel::class)->constrained('materiaux');
            $table->foreignIdFor(Palier::class)->constrained();
            $table->string('url1',500)->nullable();
            $table->string('url2',500)->nullable();
            $table->string('url3',500)->nullable();
            $table->string('url4',500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
