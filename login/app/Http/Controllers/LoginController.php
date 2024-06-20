<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index () {
        return view('login');
    }

    public function store (Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if($user && password_verify($request->input('password'), $user->password)){
            Auth::loginUsingId($user->id);
            return redirect()->route('login.show', ['user' => $user]);
        }

        return redirect()->route('login.index')->withErrors(['error' => 'E-mail ou senha incorreta!']);
    }

    public function show (User $user) {
        if(Auth::id() == $user->id){
            return view('login_show', ['user' => $user]);
        }

        return view('login');
    }

    public function destroy () {
        Auth::logout();

        return redirect()->route('login.index');
    }
}
