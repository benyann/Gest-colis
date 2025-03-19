<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'matricule',
    ];

    public function expeditions()
    {
        return $this->hasMany(Expedition::class);
    }
}
