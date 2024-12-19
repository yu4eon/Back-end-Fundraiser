<?php

namespace Database\Seeders;

use App\Models\Texte;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TexteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nouveau_texte = new Texte();
        $nouveau_texte->soustitre = 'Bienvenue sur notre site';
        $nouveau_texte->contenu = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut facilisis risus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis pulvinar ullamcorper neque, porta hendrerit elit interdum ac. Integer imperdiet leo risus, vel vestibulum lacus facilisis sit amet. Duis nulla est, pellentesque in diam ac, elementum porta felis. Praesent consectetur urna quis orci ultricies, eu convallis dolor efficitur. Nulla fermentum est ex, euismod commodo massa luctus eget. Nullam eleifend interdum odio non egestas. Cras bibendum, dui in tristique tempor, quam erat posuere mauris, ut volutpat felis leo nec mi.';
        $nouveau_texte->save();
    }   
}
