<?php

namespace Database\Seeders;

use App\Models\Materiel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterielSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nouveau_materiel = new Materiel();
        $nouveau_materiel->nom = 'Bois';
        $nouveau_materiel->caracteristique1 = 'Résistant';
        $nouveau_materiel->caracteristique2 = 'Léger';
        $nouveau_materiel->save();

        $nouveau_materiel = new Materiel();
        $nouveau_materiel->nom = 'Métal';
        $nouveau_materiel->caracteristique1 = 'Résistant';
        $nouveau_materiel->caracteristique2 = 'Lourd';
        $nouveau_materiel->save();

        $nouveau_materiel = new Materiel();
        $nouveau_materiel->nom = 'Plastique';
        $nouveau_materiel->caracteristique1 = 'Peu résistant';
        $nouveau_materiel->caracteristique2 = 'Léger';
        $nouveau_materiel->caracteristique3 = 'Peu cher';
        $nouveau_materiel->save();

        $nouveau_materiel = new Materiel();
        $nouveau_materiel->nom = 'Verre';
        $nouveau_materiel->caracteristique1 = 'Fragile';
        $nouveau_materiel->caracteristique2 = 'Transparent';
        $nouveau_materiel->caracteristique3 = 'Cher';
        $nouveau_materiel->save();
    }
}
