<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion Tech - Solutions Informatiques')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="text-2xl font-bold" style="color: #2563EB;">
                            Gestion Tech
                        </a>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('home') ? 'border-blue-600' : 'border-transparent' }} text-sm font-medium text-gray-900 hover:border-gray-300">
                            Accueil
                        </a>
                        <a href="{{ route('prestations') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('prestations') ? 'border-blue-600' : 'border-transparent' }} text-sm font-medium text-gray-900 hover:border-gray-300">
                            Prestations
                        </a>
                        <a href="{{ route('about') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('about') ? 'border-blue-600' : 'border-transparent' }} text-sm font-medium text-gray-900 hover:border-gray-300">
                            Qui sommes-nous
                        </a>
                        <a href="{{ route('contact') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('contact') ? 'border-blue-600' : 'border-transparent' }} text-sm font-medium text-gray-900 hover:border-gray-300">
                            Contact
                        </a>
                        <a href="{{ route('faq') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('faq') ? 'border-blue-600' : 'border-transparent' }} text-sm font-medium text-gray-900 hover:border-gray-300">
                            FAQ
                        </a>
                    </div>
                </div>
                <div class="flex items-center">
                    @auth
                        <div class="relative">
                            <span class="text-gray-700 mr-4">{{ auth()->user()->name }}</span>
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                                    Dashboard Admin
                                </a>
                            @else
                                <a href="{{ route('client.dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                                    Mon Espace
                                </a>
                            @endif
                            <form action="{{ route('logout') }}" method="POST" class="inline ml-2">
                                @csrf
                                <button type="submit" class="text-gray-700 hover:text-gray-900">
                                    Déconnexion
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                            Connexion
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Messages Flash -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded">
                <p class="text-green-700">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded">
                <p class="text-red-700">{{ session('error') }}</p>
            </div>
        </div>
    @endif

    <!-- Contenu -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Gestion Tech</h3>
                    <p class="text-gray-300">Votre partenaire en développement de solutions informatiques.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Liens rapides</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('prestations') }}" class="text-gray-300 hover:text-white">Prestations</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white">Qui sommes-nous</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-white">Contact</a></li>
                        <li><a href="{{ route('faq') }}" class="text-gray-300 hover:text-white">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Informations de contact</h3>
                    <p class="text-gray-300">
                        <strong>Nom:</strong> Votre Nom<br>
                        <strong>Email:</strong> votre.email@example.com<br>
                        <strong>Téléphone:</strong> +33 X XX XX XX XX
                    </p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Gestion Tech. Tous droits réservés.</p>
                <div class="mt-2">
                    <a href="{{ route('privacy') }}" class="text-gray-400 hover:text-white mx-2">Politique de confidentialité</a>
                    <a href="{{ route('terms') }}" class="text-gray-400 hover:text-white mx-2">Conditions générales</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
