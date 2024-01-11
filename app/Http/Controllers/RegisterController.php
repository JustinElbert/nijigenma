<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index',[
            'title' => 'Register'
        ]);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            // 'name' => 'required|min:5|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'src'=> ''
        ]);
        
        $user = new User;
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->src = $validatedData['src'] ?? 'default.png';

        $user->save();
        
        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }
}
