<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Validator;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::with(['author'])
            ->latest();
        return view('posts.index', [
            'posts' => $posts
        ]);
    }


    public function create(): View
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * Enregistre un nouveau post dans la base de données
     * Cette méthode est appelée quand l'utilisateur soumet le formulaire de création
     *
     * @param Request $request Contient les données du formulaire (title, content)
     * @return RedirectResponse Redirige l'utilisateur vers la liste des posts
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string',
        ]);

        Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'author' => $validated['author'],
        ]);

        return redirect()->route('posts.index')
            ->with('success', 'Post créé avec succès !');
    }
    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post): View
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        // Valide les données envoyées par le formulaire
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string',
        ]);

        $post->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'author' => $validated['author'],
        ]);

        // Redirige l'utilisateur vers le post modifié avec un message de succès
        return redirect()->route('posts.show', $post)
            ->with('success', 'Article modifié avec succès !');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        // Redirige l'utilisateur vers la liste des posts avec un message de succès
        return redirect()->route('posts.index')
            ->with('success', 'Article supprimé avec succès !');
    }
}
