@extends('layouts.admin')
@section('header', 'Tableau de bord')
@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm font-medium mb-2">Total Demandes</h3>
        <p class="text-3xl font-bold text-gray-900">{{ $stats['total_demandes'] }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm font-medium mb-2">Clients</h3>
        <p class="text-3xl font-bold text-gray-900">{{ $stats['total_clients'] }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm font-medium mb-2">En cours</h3>
        <p class="text-3xl font-bold text-blue-600">{{ $stats['demandes_bleu'] }}</p>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded">
        <p class="text-red-700 font-semibold">{{ $stats['demandes_rouge'] }}</p>
        <p class="text-sm text-red-600">Demandes envoyées</p>
    </div>
    <div class="bg-purple-50 border-l-4 border-purple-500 p-4 rounded">
        <p class="text-purple-700 font-semibold">{{ $stats['demandes_violet'] }}</p>
        <p class="text-sm text-purple-600">Demandes reçues</p>
    </div>
    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
        <p class="text-blue-700 font-semibold">{{ $stats['demandes_bleu'] }}</p>
        <p class="text-sm text-blue-600">En traitement</p>
    </div>
    <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded">
        <p class="text-green-700 font-semibold">{{ $stats['demandes_vert'] }}</p>
        <p class="text-sm text-green-600">Terminées</p>
    </div>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-xl font-semibold text-gray-900">Demandes récentes</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Client</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prestation</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($demandes_recentes as $demande)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $demande->user->name }}</div>
                        <div class="text-sm text-gray-500">{{ $demande->user->email }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $demande->prestation->titre }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full text-white {{ $demande->statut_color }}">
                            {{ $demande->statut_label }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $demande->created_at->format('d/m/Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <a href="{{ route('admin.demande.show', $demande->id) }}" class="text-blue-600 hover:text-blue-900">Voir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection