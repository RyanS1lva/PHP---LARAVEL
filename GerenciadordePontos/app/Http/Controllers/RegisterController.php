<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{

    public readonly User $user;
    public function __construct () {
        $this->user = new User;
    }

    public function index () {
        return view('register_index');
    }

    public function store (Request $request) {

        $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8|max:50'
        ],[
            'email.unique' => 'Este e-mail já está cadastrado!',
            'password.min' => 'A senha precisa ter pelo menos :min caracteres!',
            'password.confirmed' => 'As senhas não conferem!',
        ]);

        $created = $this->user->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => password_hash($request->input('password'), PASSWORD_DEFAULT)
        ]);

        if($created){
            return redirect()->route('home.index')->with('message', 'Cadastro efetuado com sucesso!');
        }
    }
    
}
