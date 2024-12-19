<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    public function palier()
    {
        return $this->belongsTo(Palier::class);
    }

    public function precommandes()
    {
        return $this->hasMany(Precommande::class);
    }

    public function materiel()
    {
        return $this->belongsTo(Materiel::class);
    }
}
