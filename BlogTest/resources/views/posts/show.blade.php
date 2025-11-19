<style>
.banniere {
    padding: 200px; 
    background-image: url('https://images.unsplash.com/photo-1485805288518-52e7a4edfd78?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=fe1153e218e3c8b93cf980551df1c2a7 ');
}
.container mt-4{
font-size: 2em;
}

</style>
<div class="banniere">
<div class="container mt-4">
    <h2>Détails du poste</h2>

    <table class="table">
        <tr><th>Title</th><td>{{ $post->title }}</td></tr>
        <tr><th>Content</th><td>{{ $post->content }}</td></tr>
         <tr><th>Author</th><td>{{ $post->author}}</td></tr>
    </table>

    <a href="{{ route('posts.edit', $post->id) }}" >Modifier</a>
   
</div>

</div>