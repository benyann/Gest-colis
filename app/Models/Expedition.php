<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expedition extends Model
{
    protected $fillable = [
        'reference',
        'date_expedition',
        'chauffeur_id',
        'agence_arrived_id'
    ];

    public function colis()
    {
        return $this->belongsToMany(Colis::class);
    }

    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class);
    }

    public function Expedition()
    {
        return $this->belongsTo(Agence::class, 'agence_arrived_id');
    }

    public function suivi()
    {
        return $this->hasMany(Suivi::class);
    }

    public function paiement()
    {
        return $this->belongsToMany(Paiement::class);
    }
}
