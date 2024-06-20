@extends('layouts.main')

@section('title', 'Perfil do usuário')

@section('content')
<div class="container">
    <div class="box-profile">
        <h2>Usuário logado</h2>
        <p>Nome: {{ $user->name }}</p>
        <p>E-mail: {{ $user->email }}</p>
        <form action="{{ route('login.destroy') }}" method="get">
            @csrf
            <button type="submit" class="btn btn-light" id="button-logout">Sair</button>
        </form>
    </div>
</div>
@endsection