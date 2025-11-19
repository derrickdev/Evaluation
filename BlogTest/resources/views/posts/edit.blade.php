<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<style>
.banniere {
    padding: 200px; 
    background-image: url('https://images.unsplash.com/photo-1512074252045-2db98d993285?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=b3df754ba457ec93cbbe4b47d6a18a5c" ');
}
</style>
<div class="banniere">
    <body>
    <div class="row"> 
    <form method="POST" action="{{ route('posts.update', $post->id) }}">
         @csrf
         @method('PUT')
        <div class="col-md-6 mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $post->title ?? '') }}" required>
        </div>
        
    <div class="col-md-6 mb-3">
            <label>Content</label>
            <input type="text" name="content" class="form-control" value="{{ old('content', $post->content ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
            <label>Author</label>
            <input type="text" name="author" class="form-control" value="{{ old('author', $post->auhtor ?? '') }}" required>
    </div>
    <button type="submit" >Submit</button>
        <a href="{{ route('posts.index') }}" >Annuler</a>
</form>
</div>
</body>
</html>  
    

