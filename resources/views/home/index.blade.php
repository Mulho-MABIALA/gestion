@extends('layouts.app')

@section('title', 'Accueil - Gestion Tech')

@section('content')
<!-- Hero Section -->
<div class="relative overflow-hidden" style="background: linear-gradient(135deg, #2563EB 0%, #1F2937 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                Vos Solutions Informatiques Sur Mesure
            </h1>
            <p class="text-xl text-gray-200 mb-8 max-w-3xl mx-auto">
                Développement de sites web, applications mobiles, applications desktop et API REST.
                Nous transformons vos idées en réalité numérique.
            </p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('prestations') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Découvrir nos services
                </a>
                <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition">
                    Nous contacter
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Prestations Section -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Nos Prestations</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Découvrez notre gamme complète de services pour répondre à tous vos besoins en développement informatique.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($prestations as $prestation)
            <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-lg transition">
                <div class="w-12 h-12 rounded-lg flex items-center justify-center mb-4" style="background-color: #2563EB;">
                    @if($prestation->icone == 'web')
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                        </svg>
                    @elseif($prestation->icone == 'mobile')
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    @elseif($prestation->icone == 'desktop')
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    @else
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    @endif
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $prestation->titre }}</h3>
                <p class="text-gray-600 mb-4">{{ Str::limit($prestation->description, 100) }}</p>
                @if($prestation->tarif_base)
                    <p class="text-blue-600 font-semibold mb-4">À partir de {{ number_format($prestation->tarif_base, 0, ',', ' ') }} €</p>
                @endif
                <a href="{{ route('prestation.show', $prestation->id) }}" class="text-blue-600 hover:text-blue-700 font-medium">
                    En savoir plus →
                </a>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('prestations') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition">
                Voir toutes nos prestations
            </a>
        </div>
    </div>
</div>

<!-- Why Choose Us Section -->
<div class="py-16" style="background-color: #f9fafb;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Pourquoi nous choisir ?</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 rounded-full mx-auto mb-4 flex items-center justify-center" style="background-color: #2563EB;">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Qualité Garantie</h3>
                <p class="text-gray-600">Solutions professionnelles testées et optimisées</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 rounded-full mx-auto mb-4 flex items-center justify-center" style="background-color: #2563EB;">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Livraison Rapide</h3>
                <p class="text-gray-600">Respect des délais et communication transparente</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 rounded-full mx-auto mb-4 flex items-center justify-center" style="background-color: #2563EB;">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Support Continu</h3>
                <p class="text-gray-600">Accompagnement et maintenance après livraison</p>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="py-16 bg-blue-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Prêt à démarrer votre projet ?</h2>
        <p class="text-xl text-blue-100 mb-8">Contactez-nous dès aujourd'hui pour discuter de vos besoins</p>
        <a href="{{ route('contact') }}" class="inline-block bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
            Demander un devis gratuit
        </a>
    </div>
</div>
@endsection
