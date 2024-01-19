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
        dd(User::where('id', auth()->user()->id)->first());
        return view('dashboard.editProfile',[
            "user" => User::where('id', auth()->user()->id)->first()
        ]);
        // dd('1');
    }
}
