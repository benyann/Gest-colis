<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suivi extends Model
{
    protected $fillable = [
        'colis_id',
        'statut',
        'description',
        'date',
        'user_id'
    ];

    public function expedition () {
        return $this->belongsTo(Expedition::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }
}
