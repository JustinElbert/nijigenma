<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Cart;
use App\Models\User;

class TransactionController extends Controller
{

    public function index(){

        $user = auth()->user();
        
        $cartItems = Cart::whereHas('post.user', function ($query) use ($user) {
                $query->where('id', $user->id);
            })
            ->where('status', 'Paid')
            ->with('user') 
            ->with('post') 
            ->get();
        
        return view('dashboard.transaction', [
            'title' => 'Cart',
            'cartItems' => $cartItems,
            'username' => $user->name, 
        ]);
    }
}
