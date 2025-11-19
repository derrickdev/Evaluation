<!DOCTYPE html>
<html>
<head>
    <title>Modifier un Article</title>
    <style>
        body {
            font-family: Arial;
            margin: 20px;
        }
        input, textarea {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }
        textarea {
            height: 100px;
        }
    </style>
</head>
<body>
    <h1>Modifier l'Article</h1>
    
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label>Titre:</label>
        <input type="text" name="title" value="{{ $post->title }}" required>
        
        <label>Contenu:</label>
        <textarea name="content" required>{{ $post->content }}</textarea>
        
        <label>Auteur:</label>
        <input type="text" name="author" value="{{ $post->author }}" required>
        
        <button type="submit">Mettre à jour</button>
        <a href="{{ route('posts.index') }}">Annuler</a>
    </form>
</body>
</html>
