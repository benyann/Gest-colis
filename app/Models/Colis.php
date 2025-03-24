<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colis extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'description',
        'valeur',
        'poids',
        'destinataire_nom',
        'destinataire_telephone',
        'destinataire_adresse',
        'expediteur_nom',
        'expediteur_telephone',
        'expediteur_adresse',
        'agence_id',
    ];

    /**
     * Relation : un colis appartient à une agence.
     */
    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }

    /**
     * Relation : un colis peut être rattaché à plusieurs expéditions (via la table pivot).
     */
    public function expeditions()
    {
        return $this->belongsToMany(Expedition::class, 'colis_expedition');
    }
}
