<style>
.banniere {
    padding: 200px; 
    background-image: url('https://images.unsplash.com/photo-1512074252045-2db98d993285?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=b3df754ba457ec93cbbe4b47d6a18a5c" ');
}
</style>
<div class="banniere">
<div class="container mt-4">
    <h2><strong>Liste des postes</strong></h2>

    <a href="{{ route('posts.create') }}" > Nouvel post</a>
      <table >
        <thead>
            <tr>
               
                <th>Title</th>
                <th>Content</th>
                <th>Author</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                   
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content}} </td>
                    <td>{{ $post->author}}</td>
                    
                    <td>
                        
                        <a href="{{ route('posts.edit', $post->id) }}" >Modifier</a>
                         <a href="{{ route('posts.show', $post->id) }}" >Voir</a>                        
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" >Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

