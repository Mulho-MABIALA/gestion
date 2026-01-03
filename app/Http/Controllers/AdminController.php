<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_demandes' => Demande::count(),
            'demandes_rouge' => Demande::where('statut', 'rouge')->count(),
            'demandes_violet' => Demande::where('statut', 'violet')->count(),
            'demandes_bleu' => Demande::where('statut', 'bleu')->count(),
            'demandes_vert' => Demande::where('statut', 'vert')->count(),
            'total_clients' => User::where('role', 'client')->count(),
        ];

        $demandes_recentes = Demande::with(['user', 'prestation'])
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('admin.dashboard', compact('stats', 'demandes_recentes'));
    }

    public function demandes()
    {
        $demandes = Demande::with(['user', 'prestation'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.demandes.index', compact('demandes'));
    }

    public function showDemande($id)
    {
        $demande = Demande::with(['user', 'prestation', 'fichiers'])->findOrFail($id);
        return view('admin.demandes.show', compact('demande'));
    }

    public function updateStatut(Request $request, $id)
    {
        $request->validate([
            'statut' => 'required|in:rouge,violet,bleu,vert',
        ]);

        $demande = Demande::findOrFail($id);
        $demande->update([
            'statut' => $request->statut,
        ]);

        return back()->with('success', 'Statut mis à jour avec succès');
    }

    public function updateDemande(Request $request, $id)
    {
        $request->validate([
            'montant_facture' => 'nullable|numeric|min:0',
            'notes_admin' => 'nullable|string',
        ]);

        $demande = Demande::findOrFail($id);
        $demande->update($request->only(['montant_facture', 'notes_admin']));

        return back()->with('success', 'Demande mise à jour avec succès');
    }

    public function sendFacture(Request $request, $id)
    {
        $request->validate([
            'montant_facture' => 'required|numeric|min:0',
        ]);

        $demande = Demande::findOrFail($id);
        $demande->update([
            'montant_facture' => $request->montant_facture,
            'facture_envoyee' => true,
        ]);

        // Envoyer l'email avec la facture
        // Mail::to($demande->user->email)->send(new FactureMail($demande));

        return back()->with('success', 'Facture envoyée avec succès');
    }

    public function clients()
    {
        $clients = User::where('role', 'client')
            ->withCount('demandes')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.clients.index', compact('clients'));
    }

    public function createClient()
    {
        return view('admin.clients.create');
    }

    public function storeClient(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'telephone' => 'nullable|string|max:20',
            'entreprise' => 'nullable|string|max:255',
            'role' => 'required|in:admin,client',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone,
            'entreprise' => $request->entreprise,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.clients')->with('success', 'Utilisateur créé avec succès');
    }

    public function showClient($id)
    {
        $client = User::with('demandes.prestation')->findOrFail($id);
        return view('admin.clients.show', compact('client'));
    }

    public function deleteClient($id)
    {
        $client = User::findOrFail($id);

        if ($client->isAdmin()) {
            return back()->with('error', 'Impossible de supprimer un administrateur');
        }

        $client->delete();
        return redirect()->route('admin.clients')->with('success', 'Client supprimé avec succès');
    }
}
