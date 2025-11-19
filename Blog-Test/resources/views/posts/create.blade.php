<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un Article</title>
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
    <h1>Ajouter un Article</h1>
    
    <form action="{{ route('posts.store') }}" method="POST">        
        <label>Titre:</label>
        <input type="text" name="title" required>
        
        <label>Contenu:</label>
        <textarea name="content" required></textarea>
        
        <label>Auteur:</label>
        <input type="text" name="author" required>
        
        <button type="submit">Publier</button>
        <a href="{{ route('posts.index') }}">Annuler</a>
    </form>
</body>
</html>
