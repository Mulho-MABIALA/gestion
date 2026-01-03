@extends('layouts.app')
@section('title', 'Contact - Gestion Tech')
@section('content')
<div class="py-16">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-8 text-center">Contactez-nous</h1>
        <form method="POST" action="{{ route('contact.send') }}" class="bg-white shadow-lg rounded-lg p-8">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Nom</label>
                <input type="text" name="name" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Sujet</label>
                <input type="text" name="subject" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Message</label>
                <textarea name="message" rows="6" class="w-full border border-gray-300 rounded-lg px-4 py-2" required></textarea>
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold">
                Envoyer
            </button>
        </form>
    </div>
</div>
@endsection