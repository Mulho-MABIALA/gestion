<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fichier extends Model
{
    protected $fillable = [
        'demande_id',
        'nom_original',
        'nom_stockage',
        'type_mime',
        'taille',
    ];

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
}
