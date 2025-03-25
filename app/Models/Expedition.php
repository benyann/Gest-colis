<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expedition extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference', 'nom', 'date_expedition', 'heure_expedition',
        'agence_depart_id', 'agence_arrivee_id', 'chauffeur_id', 'nombre_colis', 'statut'
    ];

    public function agenceDepart()
    {
        return $this->belongsTo(Agence::class, 'agence_depart_id');
    }

    public function agenceArrivee()
    {
        return $this->belongsTo(Agence::class, 'agence_arrivee_id');
    }

    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class);
    }

    public function colis()
    {
        return $this->hasMany(Colis::class);
    }
}
