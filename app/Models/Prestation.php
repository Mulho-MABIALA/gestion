<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    protected $fillable = [
        'titre',
        'description',
        'fonctionnalites',
        'tarif_base',
        'icone',
    ];

    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }
}
