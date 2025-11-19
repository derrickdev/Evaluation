<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Plateforme de Posts')</title>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <a style="text-decoration: none ; font-size: 0.9em" href="{{ route('posts.index') }}" class="text-2xl font-bold text-blue-600">
                  <p style="color:rgb(0, 90, 38) ;"> Mon application des Articles.</p>
                </a>
                <div class="space-x-4">
                    <a style="text-decoration: none"  href="{{ route('posts.index') }}" class="text-gray-700 hover:text-blue-600">
                        <h4 style="text-align: center"> Liste des Articles </h4>
                    </a>
                    <div>

                    </div>
                    {{-- Lien vers le formulaire de création --}}
                    <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Créer un Article
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <main class="container mx-auto px-4 py-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Affiche les erreurs de validation --}}
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    {{-- Boucle sur toutes les erreurs --}}
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    {{-- Pied de page --}}
    {{-- <footer class="bg-white shadow-md mt-12">
        <div class="container mx-auto px-4 py-4 text-center text-gray-600">
            <p>&copy; {{ date('Y') }} Raphaël </p>
        </div>
    </footer> --}}
</body>
</html>

