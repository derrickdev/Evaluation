<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Routes Web
|--------------------------------------------------------------------------
|
| Ici, on définit toutes les routes (URLs) de l'application
| Chaque route associe une URL à une méthode d'un contrôleur
|
*/

// Route pour la page d'accueil : redirige vers la liste des posts
Route::get('/', function () {
    // Redirige l'utilisateur vers la route 'posts.index' (la liste des posts)
    return redirect()->route('posts.index');
});
Route::resource('posts', PostController::class);
// Route::get('/contact', [NewController::class, 'contact']);




// Route::get('/contact', [NewController::class, 'contact']);
// Route::get('/services', [NewController::class, 'services']);
// Route::get('/dyna/{no}', [NewController::class, 'dyna']);
