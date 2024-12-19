<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nouvelle_page = new Page();
        $nouvelle_page->nom = "Accueil";
        $nouvelle_page->consultations = 20;
        $nouvelle_page->save();

        $nouvelle_page = new Page();
        $nouvelle_page->nom = "Profil";
        $nouvelle_page->consultations = 50;
        $nouvelle_page->save();

        $nouvelle_page = new Page();
        $nouvelle_page->nom = "Produits";
        $nouvelle_page->consultations = 40;
        $nouvelle_page->save();

        $nouvelle_page = new Page();
        $nouvelle_page->nom = "Précommande";
        $nouvelle_page->consultations = 10;
        $nouvelle_page->save();

        $nouvelle_page = new Page();
        $nouvelle_page->nom = "Nouvelles";
        $nouvelle_page->consultations = 25;
        $nouvelle_page->save();
    }
}
