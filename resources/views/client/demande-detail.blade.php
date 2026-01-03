@extends('layouts.client')
@section('title', 'Détails de la demande')
@section('content')
<div class="mb-6">
    <a href="{{ route('client.dashboard') }}" class="text-blue-600 hover:text-blue-700">&larr; Retour à mes demandes</a>
</div>

<div class="bg-white rounded-lg shadow p-8">
    <div class="flex justify-between items-start mb-6">
        <h1 class="text-3xl font-bold text-gray-900">{{ $demande->prestation->titre }}</h1>
        <span class="px-4 py-2 text-sm font-semibold rounded-full text-white {{ $demande->statut_color }}">
            {{ $demande->statut_label }}
        </span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div>
            <h3 class="font-medium text-gray-700 mb-2">Date de la demande</h3>
            <p class="text-gray-900">{{ $demande->created_at->format('d/m/Y à H:i') }}</p>
        </div>
        @if($demande->montant_facture)
        <div>
            <h3 class="font-medium text-gray-700 mb-2">Montant</h3>
            <p class="text-2xl font-bold text-blue-600">{{ number_format($demande->montant_facture, 2, ',', ' ') }} €</p>
        </div>
        @endif
    </div>

    <div class="mb-6">
        <h3 class="font-medium text-gray-700 mb-2">Description de votre besoin</h3>
        <p class="text-gray-900">{{ $demande->description_besoin }}</p>
    </div>

    @if($demande->fonctionnalites_souhaitees)
    <div class="mb-6">
        <h3 class="font-medium text-gray-700 mb-2">Fonctionnalités souhaitées</h3>
        <p class="text-gray-900">{{ $demande->fonctionnalites_souhaitees }}</p>
    </div>
    @endif

    @if($demande->fichiers->count() > 0)
    <div class="mb-6">
        <h3 class="font-medium text-gray-700 mb-2">Fichiers joints</h3>
        <ul class="space-y-2">
            @foreach($demande->fichiers as $fichier)
            <li class="flex items-center">
                <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                </svg>
                <span>{{ $fichier->nom_original }}</span>
            </li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
        <h3 class="font-medium text-blue-900 mb-2">État de votre demande</h3>
        <div class="space-y-2 text-sm text-blue-800">
            <div class="flex items-center">
                <span class="w-3 h-3 rounded-full bg-red-500 mr-3"></span>
                <span class="{{ $demande->statut == 'rouge' ? 'font-bold' : '' }}">Demande envoyée</span>
            </div>
            <div class="flex items-center">
                <span class="w-3 h-3 rounded-full bg-purple-500 mr-3"></span>
                <span class="{{ $demande->statut == 'violet' ? 'font-bold' : '' }}">Demande reçue</span>
            </div>
            <div class="flex items-center">
                <span class="w-3 h-3 rounded-full bg-blue-500 mr-3"></span>
                <span class="{{ $demande->statut == 'bleu' ? 'font-bold' : '' }}">En cours de traitement</span>
            </div>
            <div class="flex items-center">
                <span class="w-3 h-3 rounded-full bg-green-500 mr-3"></span>
                <span class="{{ $demande->statut == 'vert' ? 'font-bold' : '' }}">Terminée, prête pour livraison</span>
            </div>
        </div>
    </div>
</div>
@endsection