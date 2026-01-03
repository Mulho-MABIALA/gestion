@extends('layouts.admin')
@section('header', 'Détail du client')
@section('content')
<div class="mb-6">
    <a href="{{ route('admin.clients') }}" class="text-blue-600 hover:text-blue-700">&larr; Retour aux clients</a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Informations</h2>
        <dl class="space-y-3">
            <div><dt class="font-medium text-gray-700">Nom:</dt><dd class="text-gray-900">{{ $client->name }}</dd></div>
            <div><dt class="font-medium text-gray-700">Email:</dt><dd class="text-gray-900">{{ $client->email }}</dd></div>
            <div><dt class="font-medium text-gray-700">Téléphone:</dt><dd class="text-gray-900">{{ $client->telephone }}</dd></div>
            <div><dt class="font-medium text-gray-700">Entreprise:</dt><dd class="text-gray-900">{{ $client->entreprise ?? '-' }}</dd></div>
            <div><dt class="font-medium text-gray-700">Rôle:</dt><dd><span class="px-2 py-1 text-xs font-semibold rounded-full {{ $client->role == 'admin' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800' }}">{{ ucfirst($client->role) }}</span></dd></div>
        </dl>
    </div>

    <div class="lg:col-span-2">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Demandes du client</h2>
            @if($client->demandes->count() > 0)
                <div class="space-y-4">
                    @foreach($client->demandes as $demande)
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-semibold text-gray-900">{{ $demande->prestation->titre }}</h3>
                                <p class="text-sm text-gray-500">{{ $demande->created_at->format('d/m/Y') }}</p>
                            </div>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full text-white {{ $demande->statut_color }}">
                                {{ $demande->statut_label }}
                            </span>
                        </div>
                        <a href="{{ route('admin.demande.show', $demande->id) }}" class="text-blue-600 hover:text-blue-700 text-sm mt-2 inline-block">
                            Voir les détails →
                        </a>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-center py-8">Aucune demande pour le moment.</p>
            @endif
        </div>
    </div>
</div>
@endsection