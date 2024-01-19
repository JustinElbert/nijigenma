<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index',[
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('src')->store('post-images');

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'src' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric|min:100',
            'body' => 'required'
        ]);

        $post = new Post;
        $post->user_id = auth()->user()->id;
        $post->title = $validatedData['title'];
        $post->slug = $validatedData['slug'];
        $post->category_id = $validatedData['category_id'];
        $post->price = $validatedData['price'];
        $post->body = $validatedData['body'];
        
        if($request->file('src')){
            $validatedData['src'] = 'http://127.0.0.1:8000/storage/' . $request->file('src')->store('post-images');
        }else{
            $validatedData['src'] = '/assets/postdefault.png';
        }
        $post->src = $validatedData['src'];

        $post->save();

        return redirect('/dashboard/posts')->with('success', 'New post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit',[
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'src' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric|min:100',
            'body' => 'required'
        ];

        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }else{
            $rules['slug'] = '';
        }
        // dd($rules);
        $validatedData = $request->validate($rules);

        $post->user_id = auth()->user()->id;
        $post->title = $validatedData['title'];
        $post->slug = $validatedData['slug'];
        $post->category_id = $validatedData['category_id'];
        $post->price = $validatedData['price'];
        $post->body = $validatedData['body'];

        if($request->file('src')){
            $validatedData['src'] = 'http://127.0.0.1:8000/storage/' . $request->file('src')->store('post-images');
        }else{
            $validatedData['src'] = '/assets/postdefault.png';
        }
        $post->src = $validatedData['src'];
        
        $post->save();

        return redirect('/dashboard/posts')->with('success', 'New post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('delete', 'Post has been deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
