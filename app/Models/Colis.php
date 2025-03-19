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
        'expediteur_id',
        'agence_id'
    ];

    public function expedition()
    {
        return $this->belongsToMany(Expedition::class);
    }

    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }

    public function paiement()
    {
        return $this->hasMany(Paiement::class);
    }
}
