<!DOCTYPE html>
<html>
<head>
    <title>Liste des Articles</title>
    <style>
        body {
            font-family: Arial;
            margin: 20px;
        }
        h1 {
            color: blue;
        }
        .post {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px 0;
        }
        a {
            margin-right: 10px;
        }
        .success {
            background-color: lightgreen;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Liste des Articles</h1>
    
    <a href="{{ route('posts.create') }}">Ajouter un article</a>
    
    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @if($posts->isEmpty())
        <p>Aucun article pour le moment.</p>
    @else
        @foreach($posts as $post)
            <div class="post">
                <h2>{{ $post->title }}</h2>
                <p>Auteur: {{ $post->author }}</p>
                <p>Contenue: {{ $post->content }}</p>
                <a href="{{ route('posts.edit', $post->id) }}">Modifier</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </div>
        @endforeach
    @endif
</body>
</html>
