<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nouveau_produit = new Produit();
        $nouveau_produit->nom = 'Produit 1';
        $nouveau_produit->prix = 129.99;
        $nouveau_produit->taille = '18';
        $nouveau_produit->poids = '1.5';
        $nouveau_produit->mot_inspiration = 'Mot d\'inspiration';
        $nouveau_produit->materiel_id = 1;
        $nouveau_produit->avantage1 = 'Avantage 1';
        $nouveau_produit->caracteristique1 = 'Caractéristique 1';
        $nouveau_produit->specification1 = 'Spécification 1';
        $nouveau_produit->date_sortie = '2024-04-01';
        $nouveau_produit->description = 'Description du produit 1';
        $nouveau_produit->palier_id = 1;
        $nouveau_produit->save();

        $nouveau_produit = new Produit();
        $nouveau_produit->nom = 'Produit 2';
        $nouveau_produit->prix = 259.99;
        $nouveau_produit->taille = '24';
        $nouveau_produit->poids = '2';
        $nouveau_produit->mot_inspiration = 'Mot d\'inspiration';
        $nouveau_produit->materiel_id = 2;
        $nouveau_produit->avantage1 = 'Avantage 1';
        $nouveau_produit->caracteristique1 = 'Caractéristique 1';
        $nouveau_produit->specification1 = 'Spécification 1';
        $nouveau_produit->date_sortie = '2024-04-01';
        $nouveau_produit->description = 'Description du produit 2';
        $nouveau_produit->palier_id = 2;
        $nouveau_produit->save();

        $nouveau_produit = new Produit();
        $nouveau_produit->nom = 'Produit 3';
        $nouveau_produit->prix = 799.99;
        $nouveau_produit->taille = '24';
        $nouveau_produit->poids = '2.8';
        $nouveau_produit->mot_inspiration = 'Mot d\'inspiration';
        $nouveau_produit->materiel_id = 4;
        $nouveau_produit->avantage1 = 'Avantage 1';
        $nouveau_produit->caracteristique1 = 'Caractéristique 1';
        $nouveau_produit->specification1 = 'Spécification 1';
        $nouveau_produit->date_sortie = '2024-04-01';
        $nouveau_produit->description = 'Description du produit 3';
        $nouveau_produit->palier_id = 3;
        $nouveau_produit->save();
    }
}
