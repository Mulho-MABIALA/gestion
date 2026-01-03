@extends('layouts.admin')
@section('header', 'Gestion des demandes')
@section('content')
<div class="mb-6">
    <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:text-blue-700">&larr; Retour au dashboard</a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Client</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prestation</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($demandes as $demande)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">#{{ $demande->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $demande->user->name }}</div>
                        <div class="text-sm text-gray-500">{{ $demande->user->email }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $demande->prestation->titre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full text-white {{ $demande->statut_color }}">
                            {{ $demande->statut_label }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $demande->created_at->format('d/m/Y H:i') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <a href="{{ route('admin.demande.show', $demande->id) }}" class="text-blue-600 hover:text-blue-900">
                            Détails
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $demandes->links() }}
    </div>
</div>
@endsection