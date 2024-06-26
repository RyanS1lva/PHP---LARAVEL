<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    // Definindo o usuário e não permitindo o valor da variável ser alterado posteriormente
    public readonly User $user;
    public function __construct () {
        $this->user = new User;
    }

    public function index () {
        return view('register_index');
    }

    // Método para veriifcar o envio de formulário do usuário ao tentar realizar um cadastro
    public function store (Request $request) {

        // Verificado nome, e-mail e senha com alguns requisitos e retornando um aviso caso não cumpra algum destes
        $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8|max:50'
        ],[
            'email.unique' => 'Este e-mail já está cadastrado!',
            'password.min' => 'A senha precisa ter pelo menos :min caracteres!',
            'password.confirmed' => 'As senhas não conferem!',
        ]);

        // Caso cumpra os requisitos é criado um novo usuário inserindo no banco o seu nome, e-mail e senha
        $created = $this->user->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => password_hash($request->input('password'), PASSWORD_DEFAULT)
        ]);

        // Se criado o usuário corretamente é retornado para a rota uma mensagem de sucesso sobre a operação
        if($created){
            return redirect()->route('home.index')->with('message', 'Cadastro efetuado com sucesso!');
        }
    }
    
}
