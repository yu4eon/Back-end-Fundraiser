<?php

namespace Database\Seeders;

use App\Models\Precommande;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrecommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nouvelle_precommande = new Precommande();
        $nouvelle_precommande->nom = "Doe";
        $nouvelle_precommande->prenom = "John";
        $nouvelle_precommande->courriel = "john@gmail.com";
        $nouvelle_precommande->telephone = "514-123-4567";
        $nouvelle_precommande->adresse = "123 rue de la rue";
        $nouvelle_precommande->postal = "H1H 1H1";
        $nouvelle_precommande->pays = "Canada";
        $nouvelle_precommande->produit_id = 2;
        $nouvelle_precommande->quantite = 6;
        $nouvelle_precommande->save();
    }
}
