
@extends('layouts.app')

@section('title', $post->title)
@section('content')
<div class="max-w-4xl mx-auto">
    <a href="{{ route('posts.index') }}" class="text-blue-600 hover:underline mb-4 inline-block">
        ← Retour à la liste
    </a>
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
        <div class="text-sm text-gray-500 mb-4">
            <span>Par <strong>{{ $post->author }}</strong></span>
            <span class="ml-4">le {{ $post->created_at->format('d/m/Y à H:i') }}</span>
        </div>

        <div class="text-gray-700 mb-6 whitespace-pre-wrap">
            {{ $post->content }}
        </div>

        <div class="flex space-x-2">
            <a href="{{ route('posts.edit', $post) }}" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">
                Modifier
            </a>
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
</div>
@endsection

