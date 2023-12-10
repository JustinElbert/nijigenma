<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardPostController;

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

Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);


Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/profile', [ProfileController::class,'index'])->middleware('auth');

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
        'posts' => $category->posts->load('category','author'),
        'category' => $category->name
    ]);
});

Route::get('/authors/{author:username}', function(User $author){
    // dd($user->posts);
    return view('authors', [
        'name'=> $author->name,
        'title' => 'User Posts',
        'posts' => $author->posts->load('category','author')
    ]);
});

Route::resource('/profile/posts', DashboardPostController::class)->middleware('auth');

// Route::get('/authors/{user}', function(User $user) {
//     return view('posts', [
//         'title' => 'All Posts by '.$user->name.' :',
//         'posts' => $user->posts,
//     ]);
// });
