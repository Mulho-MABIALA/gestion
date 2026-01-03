@extends('layouts.app')
@section('title', 'Demande de ' . $prestation->titre)
@section('content')
<div class="py-16">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-8">Demande de {{ $prestation->titre }}</h1>
        <div class="bg-white shadow-lg rounded-lg p-8">
            <form method="POST" action="{{ route('demande.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="prestation_id" value="{{ $prestation->id }}">

                <h2 class="text-2xl font-bold text-gray-900 mb-4">Vos informations</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Nom complet *</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 @error('name') border-red-500 @enderror" required>
                        @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Email *</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 @error('email') border-red-500 @enderror" required>
                        @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Téléphone *</label>
                        <input type="text" name="telephone" value="{{ old('telephone') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Entreprise</label>
                        <input type="text" name="entreprise" value="{{ old('entreprise') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Mot de passe *</label>
                        <input type="password" name="password" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Confirmer le mot de passe *</label>
                        <input type="password" name="password_confirmation" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    </div>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-8">Votre projet</h2>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Description de votre besoin *</label>
                    <textarea name="description_besoin" rows="6" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>{{ old('description_besoin') }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Fonctionnalités souhaitées</label>
                    <textarea name="fonctionnalites_souhaitees" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2">{{ old('fonctionnalites_souhaitees') }}</textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Budget estimatif (€)</label>
                        <input type="number" name="budget_estimatif" value="{{ old('budget_estimatif') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Délai souhaité</label>
                        <input type="text" name="delai_souhaite" value="{{ old('delai_souhaite') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2" placeholder="Ex: 3 mois">
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Fichiers joints (PDF, images, documents...)</label>
                    <input type="file" name="fichiers[]" multiple class="w-full border border-gray-300 rounded-lg px-4 py-2">
                    <p class="text-sm text-gray-500 mt-1">Formats acceptés: PDF, DOC, DOCX, JPG, PNG, ZIP - Max 10 Mo par fichier</p>
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold">
                        Envoyer ma demande
                    </button>
                    <a href="{{ route('prestation.show', $prestation->id) }}" class="border-2 border-gray-300 text-gray-700 px-6 py-3 rounded-lg font-semibold">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection