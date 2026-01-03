@extends('layouts.admin')
@section('header', 'Créer un utilisateur')
@section('content')
<div class="mb-6">
    <a href="{{ route('admin.clients') }}" class="text-blue-600 hover:text-blue-700">&larr; Retour aux clients</a>
</div>

<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow p-8">
        <form method="POST" action="{{ route('admin.client.store') }}">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Nom *</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 @error('name') border-red-500 @enderror" required>
                    @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Email *</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 @error('email') border-red-500 @enderror" required>
                    @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Téléphone</label>
                    <input type="text" name="telephone" value="{{ old('telephone') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2">
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
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Rôle *</label>
                    <select name="role" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                        <option value="client">Client</option>
                        <option value="admin">Administrateur</option>
                    </select>
                </div>
            </div>

            <div class="flex gap-4 mt-6">
                <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold">
                    Créer l'utilisateur
                </button>
                <a href="{{ route('admin.clients') }}" class="border-2 border-gray-300 text-gray-700 px-6 py-3 rounded-lg font-semibold">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection