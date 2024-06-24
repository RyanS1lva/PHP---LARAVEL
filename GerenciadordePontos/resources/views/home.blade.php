@extends('layouts.main')

@section('title', 'Home')

@section('content')

<main>
    <div class="container">
        <a href="{{ route('mark.index') }}" class="button-def">Ir registrar ponto</a>
    </div>
</main>

@endsection