<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = [
        'colis_id',
        'montant',
        'mode_paiement',
        'date_paiement',
        'Numero'
    ];

    public function colis()
    {
        return $this->belongsTo(Colis::class);
    }

    public function expedition()
    {
        return $this->belongsToMany(Expedition::class);
    }
}
