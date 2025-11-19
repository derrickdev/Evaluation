
@extends('layouts.app')

@section('title', "Modifier l'article")

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Modifier l'article</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST" class="bg-white rounded-lg shadow-md p-6">
        @csrf
        @method('PUT')

        {{-- Champ Titre --}}
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-semibold mb-2">
                Titre de l'article
            </label>
            <input type="string"
                   id="title"
                   name="title"
                   value="{{ old('title') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                   required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Champ Contenu --}}
        <div class="mb-4">
            <label for="content" class="block text-gray-700 font-semibold mb-2">
                Contenu de l'article
            </label>
            <textarea id="content"
                      name="content"
                      rows="10"
                      class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                      required>{{ old('content') }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-semibold mb-2">
                Auteur de l'article
            </label>
            <input type="string"
                   id="author"
                   name="author"
                   value="{{ old('author') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                   required>
            @error('author')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        {{-- Boutons d'action --}}
        <div class="flex space-x-4">
            {{-- Bouton pour sauvegarder les modifications --}}
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Enregistrer les modifications
            </button>
            {{-- Lien pour annuler et retourner au post --}}
            <a href="{{ route('posts.show', $post) }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection

