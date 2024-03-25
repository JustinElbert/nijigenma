<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Cart;
use App\Models\User;

class TransactionController extends Controller
{
    public function index(){

        // $user = auth()->user();
        // $user = User::find(1);
        // $cart = Cart::where('user_id', $user->id)
        //     ->where('status', 'Paid')
        //     ->with('user')
        //     ->with('post')->get();

            $cartItems = Cart::where('status', 'Paid')
            ->with('user')
            ->with('post')
            ->get();

        $username = '';
        // dd($cartItems);

        return view('dashboard.transaction', [
            'title' => 'Cart',
            'cartItems' => $cartItems,
            'username' => $username,
        ]);
    }
}
