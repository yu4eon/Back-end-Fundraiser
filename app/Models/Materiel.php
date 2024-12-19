<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    protected $table = 'materiaux';
    use HasFactory;

    public function produits()
    {
        return $this->hasMany(Precommande::class);
    }
}
