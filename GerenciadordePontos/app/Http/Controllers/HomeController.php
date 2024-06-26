<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index () {
        // Caso o usuário já logado tente retornar ao home ele é direcionado novamente para a rota "mark.index".
        if(Auth::check()){
            return redirect()->route('mark.index');
        }

        return view ('home');
    }

    // Método para validar o envio de formulário do usuário ao tentar acessar a sua conta.
    public function store (Request $request) {
        // Verifica se foi enviado um e-mail e senha sendo obrigatórios.
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        // Caso seja enviado o e-mail e senha então é buscado no banco o usuário que tenha o e-mail enviado do formulário.
        $user = User::where('email', $request->input('email'))->first();

        // Se encontrado o e-mail no banco de dados então é verificado o hash da senha para verificar se está correta.
        if($user && password_verify($request->input('password'), $user->password)){
            // Caso os dados estejam corretos o usuário é logado com o seu id e é regenerada a sessão por questões de segurança.
            Auth::loginUsingId($user->id);
            Session::regenerate();

            return redirect()->route('mark.index');
        }

        // Caso não seja encontrado o usuário com e-mail e senha de acordo é retornado para a rota com uma mensagem de erro.
        return redirect()->route('home.index')->withErrors(['error' => 'E-mail ou senha incorreta!']);
    }
}
