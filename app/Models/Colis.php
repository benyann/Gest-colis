<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colis extends Model
{
    use HasFactory;

    protected $fillable = [
        'expedition_id', 'reference', 'description', 'valeur', 'poids',
        'destinataire_nom', 'destinataire_telephone', 'destinataire_adresse',
        'expediteur_nom', 'expediteur_telephone', 'expediteur_adresse'
    ];

    // Relation avec le modèle Paiement

    // Relation avec le modèle Expedition
    public function expedition()
    {
        return $this->belongsTo(Expedition::class);
    }
}
