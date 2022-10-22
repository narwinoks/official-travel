<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Login(){
        return view('features.auth.login');
    }
    public function ProcessLogin(Request $request){
        $credentials = $request->validate([
            'username' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return back()->with('login erorr', 'Login Faild!');
    }
}
