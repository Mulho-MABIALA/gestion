@extends('layouts.app')
@section('title', 'Connexion - Gestion Tech')
@section('content')
<div class="py-16">
    <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">Connexion</h1>
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 @error('email') border-red-500 @enderror" required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Mot de passe</label>
                    <input type="password" name="password" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                </div>
                <div class="mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="mr-2">
                        <span class="text-gray-700">Se souvenir de moi</span>
                    </label>
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold">
                    Se connecter
                </button>
            </form>
            <p class="text-center text-gray-600 mt-4">
                Admin: admin@gestion.com / password
            </p>
        </div>
    </div>
</div>
@endsection