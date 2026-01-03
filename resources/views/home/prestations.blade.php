@extends('layouts.app')

@section('title', 'Nos Prestations - Gestion Tech')

@section('content')
<div class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Nos Prestations</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Découvrez nos solutions complètes pour tous vos projets informatiques
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($prestations as $prestation)
            <div class="bg-white border border-gray-200 rounded-lg p-8 hover:shadow-xl transition">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $prestation->titre }}</h2>
                <p class="text-gray-600 mb-6">{{ $prestation->description }}</p>

                @if($prestation->fonctionnalites)
                    <h3 class="font-semibold text-gray-900 mb-3">Fonctionnalités incluses :</h3>
                    <ul class="space-y-2 mb-6">
                        @foreach(json_decode($prestation->fonctionnalites) as $fonctionnalite)
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">{{ $fonctionnalite }}</span>
                        </li>
                        @endforeach
                    </ul>
                @endif

                @if($prestation->tarif_base)
                    <p class="text-3xl font-bold text-blue-600 mb-6">{{ number_format($prestation->tarif_base, 0, ',', ' ') }} €</p>
                @endif

                <a href="{{ route('demande.create', $prestation->id) }}" class="inline-block w-full text-center bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition">
                    Faire une demande
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
