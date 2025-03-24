<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'matricule', // Matricule de la voiture
        'statut',    // Ex : disponible, occupé, etc.
    ];

    /**
     * Un chauffeur peut avoir plusieurs expéditions.
     */
    public function expeditions()
    {
        return $this->hasMany(Expedition::class);
    }
}
