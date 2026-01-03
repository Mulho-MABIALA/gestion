@extends('layouts.client')
@section('title', 'Mon Espace - Gestion Tech')
@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-4">Bonjour {{ auth()->user()->name }}</h1>
    <p class="text-gray-600">Bienvenue dans votre espace client. Suivez l'état de vos demandes ici.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm font-medium mb-2">Total Demandes</h3>
        <p class="text-3xl font-bold text-gray-900">{{ $stats['total_demandes'] }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm font-medium mb-2">En cours</h3>
        <p class="text-3xl font-bold text-blue-600">{{ $stats['demandes_en_cours'] }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm font-medium mb-2">Terminées</h3>
        <p class="text-3xl font-bold text-green-600">{{ $stats['demandes_terminees'] }}</p>
    </div>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-xl font-semibold text-gray-900">Mes demandes</h2>
    </div>
    <div class="p-6">
        @if($demandes->count() > 0)
            <div class="space-y-4">
                @foreach($demandes as $demande)
                <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ $demande->prestation->titre }}</h3>
                            <p class="text-sm text-gray-500">Demande créée le {{ $demande->created_at->format('d/m/Y à H:i') }}</p>
                        </div>
                        <span class="px-3 py-1 text-xs font-semibold rounded-full text-white {{ $demande->statut_color }}">
                            {{ $demande->statut_label }}
                        </span>
                    </div>
                    <p class="text-gray-700 mb-4">{{ Str::limit($demande->description_besoin, 150) }}</p>
                    <div class="flex justify-between items-center">
                        @if($demande->montant_facture)
                            <p class="text-blue-600 font-semibold">Montant: {{ number_format($demande->montant_facture, 2, ',', ' ') }} €</p>
                        @else
                            <p class="text-gray-500">Montant en cours de calcul</p>
                        @endif
                        <a href="{{ route('client.demande.show', $demande->id) }}" class="text-blue-600 hover:text-blue-700 font-medium">
                            Voir les détails →
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500 py-8">Vous n'avez pas encore de demande.</p>
            <div class="text-center">
                <a href="{{ route('prestations') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold">
                    Découvrir nos prestations
                </a>
            </div>
        @endif
    </div>
</div>
@endsection