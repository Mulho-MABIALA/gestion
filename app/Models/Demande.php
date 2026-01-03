<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    protected $fillable = [
        'user_id',
        'prestation_id',
        'description_besoin',
        'fonctionnalites_souhaitees',
        'budget_estimatif',
        'delai_souhaite',
        'statut',
        'montant_facture',
        'facture_envoyee',
        'notes_admin',
    ];

    protected $casts = [
        'budget_estimatif' => 'decimal:2',
        'montant_facture' => 'decimal:2',
        'facture_envoyee' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prestation()
    {
        return $this->belongsTo(Prestation::class);
    }

    public function fichiers()
    {
        return $this->hasMany(Fichier::class);
    }

    public function getStatutLabelAttribute()
    {
        return match($this->statut) {
            'rouge' => 'Demande envoyée',
            'violet' => 'Demande reçue',
            'bleu' => 'En cours de traitement',
            'vert' => 'Terminée, prête pour livraison',
            default => $this->statut,
        };
    }

    public function getStatutColorAttribute()
    {
        return match($this->statut) {
            'rouge' => 'bg-red-500',
            'violet' => 'bg-purple-500',
            'bleu' => 'bg-blue-500',
            'vert' => 'bg-green-500',
            default => 'bg-gray-500',
        };
    }
}
