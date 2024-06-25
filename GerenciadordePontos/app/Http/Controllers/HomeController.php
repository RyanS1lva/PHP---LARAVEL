<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index () {
        return view ('home');
    }

    public function store (Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if($user && password_verify($request->input('password'), $user->password)){
            Auth::loginUsingId($user->id);
            return redirect()->route('mark.index');
        }

        return redirect()->route('home.index')->withErrors(['error' => 'E-mail ou senha incorreta!']);
    }
}
