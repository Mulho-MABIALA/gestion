@extends('layouts.admin')
@section('header', 'Détail de la demande #' . $demande->id)
@section('content')
<div class="mb-6">
    <a href="{{ route('admin.demandes') }}" class="text-blue-600 hover:text-blue-700">&larr; Retour aux demandes</a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Informations du client</h2>
            <dl class="grid grid-cols-2 gap-4">
                <div><dt class="font-medium text-gray-700">Nom:</dt><dd class="text-gray-900">{{ $demande->user->name }}</dd></div>
                <div><dt class="font-medium text-gray-700">Email:</dt><dd class="text-gray-900">{{ $demande->user->email }}</dd></div>
                <div><dt class="font-medium text-gray-700">Téléphone:</dt><dd class="text-gray-900">{{ $demande->user->telephone }}</dd></div>
                <div><dt class="font-medium text-gray-700">Entreprise:</dt><dd class="text-gray-900">{{ $demande->user->entreprise ?? '-' }}</dd></div>
            </dl>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Détails du projet</h2>
            <div class="mb-4">
                <h3 class="font-medium text-gray-700 mb-2">Prestation demandée:</h3>
                <p class="text-gray-900">{{ $demande->prestation->titre }}</p>
            </div>
            <div class="mb-4">
                <h3 class="font-medium text-gray-700 mb-2">Description du besoin:</h3>
                <p class="text-gray-900">{{ $demande->description_besoin }}</p>
            </div>
            @if($demande->fonctionnalites_souhaitees)
            <div class="mb-4">
                <h3 class="font-medium text-gray-700 mb-2">Fonctionnalités souhaitées:</h3>
                <p class="text-gray-900">{{ $demande->fonctionnalites_souhaitees }}</p>
            </div>
            @endif
            <div class="grid grid-cols-2 gap-4">
                @if($demande->budget_estimatif)
                <div><dt class="font-medium text-gray-700">Budget estimatif:</dt><dd class="text-gray-900">{{ number_format($demande->budget_estimatif, 2, ',', ' ') }} €</dd></div>
                @endif
                @if($demande->delai_souhaite)
                <div><dt class="font-medium text-gray-700">Délai souhaité:</dt><dd class="text-gray-900">{{ $demande->delai_souhaite }}</dd></div>
                @endif
            </div>
        </div>

        @if($demande->fichiers->count() > 0)
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Fichiers joints</h2>
            <ul class="space-y-2">
                @foreach($demande->fichiers as $fichier)
                <li class="flex items-center">
                    <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                    <span class="text-gray-900">{{ $fichier->nom_original }}</span>
                    <span class="text-gray-500 text-sm ml-2">({{ number_format($fichier->taille / 1024, 2) }} KB)</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <div class="space-y-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Changer le statut</h2>
            <form method="POST" action="{{ route('admin.demande.statut', $demande->id) }}">
                @csrf
                <select name="statut" class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-4">
                    <option value="rouge" {{ $demande->statut == 'rouge' ? 'selected' : '' }}>🔴 Demande envoyée</option>
                    <option value="violet" {{ $demande->statut == 'violet' ? 'selected' : '' }}>🟣 Demande reçue</option>
                    <option value="bleu" {{ $demande->statut == 'bleu' ? 'selected' : '' }}>🔵 En cours de traitement</option>
                    <option value="vert" {{ $demande->statut == 'vert' ? 'selected' : '' }}>🟢 Terminée</option>
                </select>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold">
                    Mettre à jour
                </button>
            </form>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Facturation</h2>
            <form method="POST" action="{{ route('admin.demande.facture', $demande->id) }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Montant (€)</label>
                    <input type="number" step="0.01" name="montant_facture" value="{{ $demande->montant_facture }}" class="w-full border border-gray-300 rounded-lg px-4 py-2">
                </div>
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-semibold">
                    Envoyer la facture
                </button>
                @if($demande->facture_envoyee)
                <p class="text-green-600 text-sm mt-2">✓ Facture déjà envoyée</p>
                @endif
            </form>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Notes internes</h2>
            <form method="POST" action="{{ route('admin.demande.update', $demande->id) }}">
                @csrf
                <textarea name="notes_admin" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-4">{{ $demande->notes_admin }}</textarea>
                <button type="submit" class="w-full bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-semibold">
                    Sauvegarder
                </button>
            </form>
        </div>
    </div>
</div>
@endsection