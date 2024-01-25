<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class CartController extends Controller
{
    // public function index(){
    //     return view('cart.index',[
    //         "title" => 'Cart',
    //         "cartItems" => [
    //             [
    //                 'src' => 'test1',
    //                 'title' => 'item1',
    //                 'price' => '10.99',
    //             ],
    //             [
    //                 'src' => 'test2',
    //                 'title' => 'item2',
    //                 'price' => '19.99',
    //             ],
    //             // Add more items as needed
    //         ]
    //     ]);
    // }

    public function index()
    {
        // Fetch cart items from the session or database
        $cartItems = session('cart', []);
    
        return view('cart.index', [
            'title' => 'Cart', // Add the title variable here
            'cartItems' => $cartItems,
        ]);
    }

    public function addToCart(Request $request, $postId)
    {
        $post = Post::find($postId);
        
        if (!$post) {
            abort(404, 'post not found');
        }

        $cartItems = $request->session()->get('cart', []);
        
        $cartItems[$postId] = [
            'id' => $post->id,
            'src' => $post->src,
            'title' => $post->title,
            'price' => $post->price
        ];

        $request->session()->put('cart', $cartItems);

        return redirect()->back()->with('success', 'Post added to cart successfully');
    }

    public function removeFromCart(Request $request, $postId)
    {

        $cartItems = $request->session()->get('cart', []);

        if (isset($cartItems[$postId])) {
            
            unset($cartItems[$postId]);

            $request->session()->put('cart', $cartItems);

            return redirect()->back()->with('success', 'Post removed from cart successfully');
        }

        return redirect()->back()->with('error', 'Post not found in the cart');
    }
}
