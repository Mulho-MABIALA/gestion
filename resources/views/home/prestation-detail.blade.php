@extends('layouts.app')

@section('title', $prestation->titre . ' - Gestion Tech')

@section('content')
<div class="py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-6">{{ $prestation->titre }}</h1>
            <p class="text-xl text-gray-600 mb-8">{{ $prestation->description }}</p>

            @if($prestation->fonctionnalites)
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Fonctionnalités incluses</h2>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    @foreach(json_decode($prestation->fonctionnalites) as $fonctionnalite)
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-gray-700">{{ $fonctionnalite }}</span>
                    </li>
                    @endforeach
                </ul>
            @endif

            @if($prestation->tarif_base)
                <div class="bg-blue-50 rounded-lg p-6 mb-8">
                    <p class="text-gray-700 mb-2">Tarif de base</p>
                    <p class="text-4xl font-bold text-blue-600">{{ number_format($prestation->tarif_base, 0, ',', ' ') }} €</p>
                    <p class="text-sm text-gray-600 mt-2">* Tarif indicatif, le prix final sera calculé selon vos besoins</p>
                </div>
            @endif

            <div class="flex gap-4">
                <a href="{{ route('demande.create', $prestation->id) }}" class="flex-1 text-center bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition">
                    Faire une demande
                </a>
                <a href="{{ route('prestations') }}" class="border-2 border-gray-300 hover:border-gray-400 text-gray-700 px-6 py-3 rounded-lg font-semibold transition">
                    Retour
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
