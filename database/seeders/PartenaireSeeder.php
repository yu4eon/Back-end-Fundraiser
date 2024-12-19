<?php

namespace Database\Seeders;

use App\Models\Partenaire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartenaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nouveau_partenaire = new Partenaire();
        $nouveau_partenaire->nom = 'Partenaire 1';
        $nouveau_partenaire->description = 'Description du partenaire 1';
        $nouveau_partenaire->url = 'images/1714484447_8740.png';
        $nouveau_partenaire->save();
    }
}
