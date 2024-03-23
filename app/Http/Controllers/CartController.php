<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Cart;
use PhpParser\Node\Expr\Cast\String_;

class CartController extends Controller
{
    private string $orderId;
    
    public function __construct()
    {
        $this->orderId = 'ORDER_' . Str::random(10);
    }

    public function index()
    {
        $user = auth()->user();
        $cart = $user->cart;

        return view('cart.index', [
            'title' => 'Cart',
            'cartItems' => $cart,
        ]);
    }

    public function index2()
    {
        $user = auth()->user();

        return view('cart.carl', [
            'title' => 'Cart',
        ]);
    }

    public function addToCart(Request $request, $postId)
    {
        $post = Post::find($postId);
        $cartItems = new Cart();

        if (!$post) {
            abort(404, 'Post not found');
        }

        $user = auth()->user();

        // Create or update a cart item for the user
        $cartItems = Cart::updateOrCreate(
            ['user_id' => $user->id, 'post_id' => $postId], 
            [
                'src' => $post->src,
                'title' => $post->title,
                'price' => $post->price
            ]
        );

        $cartItems = Cart::where('user_id', $user->id)->get();

        return redirect()->back()->with('success', 'Post added to cart successfully');
    }

    public function removeFromCart(Request $request, $postId)
    {
        $user = auth()->user();

        $cartItems = $user->cart->where('post_id', $postId)->first();

        if ($cartItems) {
            // Delete the cart item
            $cartItems->delete();

            return redirect()->back()->with('success', 'Post removed from cart successfully');
        }

        return redirect()->back()->with('error', 'Post not found in the cart');
    }

    public function checkout(Request $request){
        $request->request->add(['status' => 'unpaid']);
        $user = auth()->user();
        $total_price = Cart::where("user_id", $user->id)->sum("price");
        $cartItems = Cart::where('user_id', auth()->id())->get();

        //SAMPLE REQUEST START HERE
        
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $this->orderId,
                'gross_amount' => $total_price,
            ),
            'customer_details' => array(
                'first_name' => $user->username,
                'email' => $user->email,
            ),
        );
        
        // dd($params);
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($params);
        // dd($snapToken);
        return view('cart.checkout', compact('snapToken','cartItems','total_price'));
    }

    public function checkout_data(Request $request){
        $user = auth()->user();
        $total_price = Cart::where("user_id", $user->id)->sum("price");

        return view('cart.checkout', [
            'title' => 'Cart',
            'total_price' => $total_price,
        ]);
    }


    public function callback(Request $request){
        // dd($request);
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey); 
        // dd($this->orderId);
        $temp = $this->orderId;
        // $order = Cart::find($request->order_id);
        
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture'){
                $order = Cart::find($temp);
                // $order->update(['orderId' => $temp]);
                $order->update(['status' => 'Paid']);
            }
        }
    }
}
