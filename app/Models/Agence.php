<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    protected $fillable = [
        'nom',
        'ville',
        'adresse',
    ];

    public function colis()
    {
        return $this->hasMany(Colis::class);
    }

    public function expediteurs()
    {
        return $this->hasMany(Expedition::class, 'agence_arrived_id');
    }
}
