<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function viewEditProfile(){
        // dd(User::where('id', auth()->user()->id)->first());
        return view('dashboard.editProfile',[
            "user" => User::where('id', auth()->user()->id)->first()
        ]);
        // dd('1');
    }

    public function updateProfile(Request $request, User $user){

        $validatedData = $request->validate([
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'password' => 'required|min:5|max:255',
            'src'=> 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user->id = auth()->user()->id;
        $user->username = $validatedData['username'];
        if ($request->filled('password')) {
            $user->password = bcrypt($validatedData['password']);
        }

        if($request->file('src')){
            $validatedData['src'] = 'http://127.0.0.1:8000/storage/' . $request->file('src')->store('post-images');
        }else{
            $validatedData['src'] = '/assets/default.png';
        }
        $user->src = $validatedData['src'];

        $user->save();
        return redirect('/dashboard')->with('success', 'Your profile has been updated');
    }
}
