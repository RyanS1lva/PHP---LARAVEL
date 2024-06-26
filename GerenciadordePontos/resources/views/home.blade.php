@extends('layouts.main')

@section('title', 'Home')

@section('content')

<main>
    <div class="home">
        <div class="form-home">
            <form  action="{{ route('home.store') }}" method="post">
              <h2>Login</h2>
                @csrf
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="email" class="form-control" placeholder="Insira o seu e-mail" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" placeholder="Insira a sua senha" name="password" required>
                  </div>
                  <button type="submit" class="btn btn-secondary">Acessar</button>
              </form>
              <a href="{{ route('register.index') }}" id="regis-link">Registre-se</a>
              @if(session()->has('message'))
                <p class="message">{{ session()->get('message') }}</p>
              @endif
              {{-- Caso tenha algum erro retornado para a rota é exibido ao usuário a mensagem de acordo --}}
              @error('error')
                <span>{{ $message }}</span>
              @enderror
        </div>
        <div id="title-home">
           <h2>Dot Mark, <br> sempre atualizado no devido tempo.</h2>
        </div>
    </div>
</main>

@endsection