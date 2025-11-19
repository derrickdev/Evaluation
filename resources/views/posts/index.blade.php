
@extends('layouts.app')
@section('title', 'Liste des Posts')

@section('content')
<div class="max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Tous les Articles</h1>

    @if($posts->count() > 0)
        @foreach($posts as $post)
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-2xl font-semibold mb-2">
                    <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:underline">
                        {{ $post->title }}
                    </a>
                </h2>

                {{-- Affiche le contenu du post (limité à 200 caractères) --}}
                <p class="text-gray-700 mb-4">
                    {{-- Str::limit() limite le texte à 200 caractères et ajoute "..." si nécessaire --}}
                    {{ Str::limit($post->content, 200) }}
                </p>

                {{-- Informations sur le post (auteur, date, nombre de commentaires) --}}
                <div class="flex justify-between items-center text-sm text-gray-500">
                    <div>
                        {{-- Affiche le nom de l'auteur --}}
                        {{-- $post->user accède à la relation définie dans le modèle Post --}}
                        <span>Par <strong>{{ $post->user->name }}</strong></span>
                        {{-- Affiche la date de création --}}
                        {{-- diffForHumans() affiche "il y a 2 heures" au lieu de la date complète --}}
                        <span class="ml-4">le {{ $post->created_at->format('d/m/Y à H:i') }}</span>
                    </div>
                </div>

                {{-- Boutons d'action --}}
                <div class="mt-4 flex space-x-2">
                    {{-- Bouton pour voir le post --}}
                    <a href="{{ route('posts.show', $post) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Voir l'Article
                    </a>
                    {{-- Bouton pour modifier le post --}}
                    <a href="{{ route('posts.edit', $post) }}" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">
                        Modifier
                    </a>
                    {{-- Formulaire pour supprimer le post --}}
                    {{-- method('DELETE') indique que c'est une requête DELETE --}}
                    {{-- @csrf génère un token de sécurité pour protéger contre les attaques CSRF --}}
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce post ?')">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    @else
        {{-- Message affiché s'il n'y a aucun post --}}
        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <p class="text-gray-600 text-lg">Aucun article pour le moment.</p>
            {{-- Lien pour créer le premier post --}}
            <a href="{{ route('posts.create') }}" class="text-blue-600 hover:underline mt-4 inline-block">
                Créer le premier Article
            </a>
        </div>
    @endif
</div>
@endsection

