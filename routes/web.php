<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('about', function () {
    return view('welcome');
});

Route::get('/', [PostController::class, 'index']);

// halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    return view('category', [
        'title' => $category->name,
        'posts' => $category->posts,
        'category' => $category->name
    ]);
});

Route::get('/authors/{author:username}', function(User $author){
    // dd($user->posts);
    return view('authors', [
        'name'=> $author->name,
        'title' => 'User Posts',
        'posts' => $author->posts,
    ]);
});


// Route::get('/authors/{user}', function(User $user) {
//     return view('posts', [
//         'title' => 'All Posts by '.$user->name.' :',
//         'posts' => $user->posts,
//     ]);
// });
