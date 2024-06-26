@extends('layouts.main')

@section('title', 'Cadastrar')

@section('content')

<main>
    <div class="home">
        <div class="form-home">
            <form  action="{{ route('register.store') }}" method="post">
                @csrf
                <h2>Registre-se</h2>
                <div class="form-group">
                    <label for="name">Nome Completo</label>
                    <input type="text" class="form-control" placeholder="Insira o seu nome" name="name"  value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" placeholder="Insira o seu e-mail" name="email"  value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" placeholder="Insira a sua senha" name="password" required>
                </div>
                <div class="form-group">
                    <label for="password">Confirme a Senha</label>
                    <input type="password" class="form-control" placeholder="Digite novamente a senha" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-secondary">Cadastrar</button>
            </form>
            <a href="{{ route('home.index') }}" id="regis-link">Já possuo um cadastro</a>
        </div>
        <div class="erros">
            {{-- Exibindo os erros ao usuário caso tenha algum --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</main>

@endsection