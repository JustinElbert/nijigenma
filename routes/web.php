<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransactionController;

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

Route::get('/dashboard', [DashboardController::class,'index'])->middleware('auth');
Route::get('/dashboard/editProfile', [DashboardController::class,'viewEditProfile'])->middleware('auth');
Route::put('/dashboard/editProfile/{user:id}', [DashboardController::class,'updateProfile'])->middleware('auth');

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
        'username'=> $author->username,
        'title' => 'User Posts',
        'posts' => $author->posts->load('category','author')
    ]);
});

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');


// index(view), addtocart, removefromcart
Route::get('/cart',[CartController::class,'index'])->middleware('auth');

Route::post('/cart/{postId}', [CartController::class,'addToCart'])->name('addToCart');
Route::delete('/remove-from-cart/{postId}', [CartController::class, 'removeFromCart'])->name('removeFromCart');
Route::post('/checkout', [CartController::class,'checkout'])->name('checkout');
// Route::post('/checkout', [CartController::class,'callback']);

//show transaction page
Route::get('/transaction',[TransactionController::class,'index'])->middleware('auth');
