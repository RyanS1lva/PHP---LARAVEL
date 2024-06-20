<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public readonly User $user;
    public function __construct () {
        $this->user = new User;
    }


    public function index () {
        return view('register');
    }

    public function store (Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|confirmed',
        ],[
            'email.unique' => 'Este e-mail já está cadastrado!',
            'password.min' => 'A senha precisa ter pelo menos :min caracteres!',
            'password.confirmed' => 'As senhas não conferem!',
        ]);

        $created = $this->user->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => password_hash($request->input('password'), PASSWORD_DEFAULT),
        ]);

        if($created){
            return redirect()->route('login.index')->with('message', 'Cadastro efetuado com sucesso!');
        }


    }
}
