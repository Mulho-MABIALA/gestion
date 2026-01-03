<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $demandes = $user->demandes()->with('prestation')->orderBy('created_at', 'desc')->get();

        $stats = [
            'total_demandes' => $demandes->count(),
            'demandes_en_cours' => $demandes->whereIn('statut', ['rouge', 'violet', 'bleu'])->count(),
            'demandes_terminees' => $demandes->where('statut', 'vert')->count(),
        ];

        return view('client.dashboard', compact('demandes', 'stats'));
    }

    public function showDemande($id)
    {
        $demande = Auth::user()->demandes()
            ->with(['prestation', 'fichiers'])
            ->findOrFail($id);

        return view('client.demande-detail', compact('demande'));
    }
}
