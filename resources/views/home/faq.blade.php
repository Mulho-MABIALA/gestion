@extends('layouts.app')
@section('title', 'FAQ - Gestion Tech')
@section('content')
<div class="py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-8">FAQ - Questions Fréquentes</h1>
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-bold text-gray-900 mb-2">Comment faire une demande de prestation ?</h3>
                <p class="text-gray-700">Sélectionnez la prestation qui vous intéresse, puis cliquez sur "Faire une demande". Remplissez le formulaire avec vos informations et vos besoins.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-bold text-gray-900 mb-2">Quels sont les délais de livraison ?</h3>
                <p class="text-gray-700">Les délais varient selon la complexité du projet. Ils seront précisés dans le devis personnalisé.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-bold text-gray-900 mb-2">Comment suivre l'avancement de mon projet ?</h3>
                <p class="text-gray-700">Vous pouvez suivre l'état de votre demande depuis votre espace client à tout moment.</p>
            </div>
        </div>
    </div>
</div>
@endsection