<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        return view('home',[
            "title" => "Home",
            // "posts" => Post::all()
            // "posts" => Post::latest()->get()
            "posts" => Post::take(20)->get()
        ]);
    }

    public function show(Post $post){
        return view ('post', [
            "title" => "Single Post",
            "post" => $post
        ]);
    }
}
