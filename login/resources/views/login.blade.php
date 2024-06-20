@extends('layouts.main')

@section('title', 'Login')

@section('content')
<div class="container">
    <form action="{{ route('login.store') }}" method="post" id="form-login">
        @csrf
        <h2>Login</h2>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-light" id="button-login">Acessar</button>
        @if(session()->has('message'))
            <span class="message-success">{{ session()->get('message') }}</span>
        @endif
        @error('error')
            <span>{{ $message }}</span>
        @enderror
    </form>
    <a href="{{ route('register.index') }}" id="link-for-reg">Registrar</a>
</div>
@endsection