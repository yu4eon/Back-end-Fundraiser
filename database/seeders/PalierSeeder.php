<?php

namespace Database\Seeders;

use App\Models\Palier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PalierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nouveau_palier = new Palier();
        $nouveau_palier->nom = 'Modèle Standard';
        $nouveau_palier->description = 'Description du palier 1';
        $nouveau_palier->save();

        $nouveau_palier = new Palier();
        $nouveau_palier->nom = 'Modèle Premium';
        $nouveau_palier->description = 'Description du palier 2';
        $nouveau_palier->save();

        $nouveau_palier = new Palier();
        $nouveau_palier->nom = 'Modèle Luxe';
        $nouveau_palier->description = 'Description du palier 3';
        $nouveau_palier->save();
    }
}
