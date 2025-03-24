<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expedition extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'date_expedition',
        'creneau',
        'chauffeur_id',
        'agence_id',
        'poids_total',
        'nombre_colis',
        'statut',
    ];

    /**
     * Relation : Une expédition contient plusieurs colis (relation ManyToMany via table pivot).
     */
    public function colis()
    {
        return $this->belongsToMany(Colis::class, 'colis_expedition')->withTimestamps();
    }

    /**
     * Relation : Une expédition appartient à un chauffeur.
     */
    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class);
    }

    /**
     * Relation : Une expédition appartient à une agence (agence de destination).
     */
    public function agence()
    {
        return $this->belongsTo(Agence::class, 'agence_id');
    }

    /**
     * Relation : Une expédition peut avoir plusieurs suivis (si tu gères le tracking/logistique).
     */
    public function suivis()
    {
        return $this->hasMany(Suivi::class);
    }

    /**
     * Relation : Une expédition peut avoir plusieurs paiements (si tu gères une facturation).
     */
    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }
}
