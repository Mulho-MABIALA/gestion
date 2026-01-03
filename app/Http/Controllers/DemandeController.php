<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Prestation;
use App\Models\Fichier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DemandeController extends Controller
{
    public function create($prestation_id)
    {
        $prestation = Prestation::findOrFail($prestation_id);
        return view('demandes.create', compact('prestation'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'telephone' => 'required|string|max:20',
            'entreprise' => 'nullable|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'prestation_id' => 'required|exists:prestations,id',
            'description_besoin' => 'required|string',
            'fonctionnalites_souhaitees' => 'nullable|string',
            'budget_estimatif' => 'nullable|numeric|min:0',
            'delai_souhaite' => 'nullable|string|max:255',
            'fichiers.*' => 'nullable|file|max:10240|mimes:pdf,doc,docx,jpg,jpeg,png,zip',
        ]);

        // Créer le compte client
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'entreprise' => $request->entreprise,
            'password' => Hash::make($request->password),
            'role' => 'client',
        ]);

        // Créer la demande
        $demande = Demande::create([
            'user_id' => $user->id,
            'prestation_id' => $request->prestation_id,
            'description_besoin' => $request->description_besoin,
            'fonctionnalites_souhaitees' => $request->fonctionnalites_souhaitees,
            'budget_estimatif' => $request->budget_estimatif,
            'delai_souhaite' => $request->delai_souhaite,
            'statut' => 'rouge',
        ]);

        // Gérer les fichiers joints
        if ($request->hasFile('fichiers')) {
            foreach ($request->file('fichiers') as $fichier) {
                $nomOriginal = $fichier->getClientOriginalName();
                $nomStockage = time() . '_' . uniqid() . '_' . $nomOriginal;
                $fichier->storeAs('demandes', $nomStockage, 'public');

                Fichier::create([
                    'demande_id' => $demande->id,
                    'nom_original' => $nomOriginal,
                    'nom_stockage' => $nomStockage,
                    'type_mime' => $fichier->getMimeType(),
                    'taille' => $fichier->getSize(),
                ]);
            }
        }

        // Connecter automatiquement le client
        Auth::login($user);

        return redirect()->route('client.dashboard')->with('success', 'Votre demande a été envoyée avec succès ! Vous pouvez suivre son avancement depuis votre espace.');
    }
}
