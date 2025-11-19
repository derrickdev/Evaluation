<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index ()
    {
        $posts = Post::all();
        return view ('posts.index', compact('posts'));
    }

     public function create()
    {
        //
        return view('posts.create');
    }


    public function store(Request $request)
    {
       
        $validated = $request->validate([
        'title'=> 'required|string|max:255',
        'content'=> 'required',
        'author'=> 'required|string|max:255',
          
       ]);
       
      $post = Post::create($validated);
    return redirect()->route("posts.index")->with('success', 'Poste ajouté avec succès !');
    }
  
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        //
        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, Post $post)
    {
        //
        $validated = $request->validate([
        'title'=> 'required|string|max:255',
        'content'=> 'required',
        'author'=> 'required|string|max:255',
        'created_at'=> 'required|date',
        'updated_at'=> 'required|date',
        ]);
        $post->update($validated);

        return redirect()->route('posts.index')
                         ->with('success', 'Poste mise à jour avec succès.');
    }

     public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect()->route('posts.index')
                         ->with('success', 'poste supprimé avec succès.');
    }

}
