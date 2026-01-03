@extends('layouts.app')

@section('title', 'Qui sommes-nous - Gestion Tech')

@section('content')
<div class="py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-8">Qui sommes-nous ?</h1>

        <div class="prose max-w-none">
            <p class="text-lg text-gray-700 mb-6">
                Gestion Tech est une entreprise spécialisée dans le développement de solutions logicielles sur mesure.
                Nous mettons notre expertise au service de vos projets informatiques.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-8">Notre Mission</h2>
            <p class="text-gray-700 mb-6">
                Accompagner les entreprises dans leur transformation numérique en développant des solutions
                innovantes, performantes et adaptées à leurs besoins spécifiques.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-8">Nos Valeurs</h2>
            <ul class="space-y-3">
                <li class="flex items-start">
                    <svg class="w-6 h-6 text-blue-600 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <div>
                        <strong>Excellence:</strong> Nous visons la qualité dans chaque projet
                    </div>
                </li>
                <li class="flex items-start">
                    <svg class="w-6 h-6 text-blue-600 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <div>
                        <strong>Innovation:</strong> Utilisation des technologies modernes et éprouvées
                    </div>
                </li>
                <li class="flex items-start">
                    <svg class="w-6 h-6 text-blue-600 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <div>
                        <strong>Transparence:</strong> Communication claire et honnête avec nos clients
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
