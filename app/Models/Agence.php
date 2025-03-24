<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agence extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'telephone',
    ];

    /**
     * Une agence peut avoir plusieurs expéditions.
     */
    public function expeditions()
    {
        return $this->hasMany(Expedition::class);
    }

    /**
     * Une agence peut avoir plusieurs colis.
     */
    public function colis()
    {
        return $this->hasMany(Colis::class);
    }
}
