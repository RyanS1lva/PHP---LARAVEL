@extends('layouts.main')

@section('title', 'Registrar')

@section('content')
<div class="container">
    <form action="{{ route('register.store') }}" method="post" id="form-reg">
        @csrf
        <h2>Registre-se</h2>
        <div class="form-group">
            <label for="name">Nome completo</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirme a senha</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-light" id="button-login">Registrar</button>
        <br>
        @error('email')
            <span>{{ $message }}</span>
        @enderror
        @error('password')
            <span>{{ $message }}</span>
        @enderror
    </form>
    <a href="{{ route('login.index') }}" id="link-for-reg">Já possuo um cadastro</a>
</div>
@endsection