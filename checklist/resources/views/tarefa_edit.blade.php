@extends('layouts.main')

@section('title', 'Editar')

@section('content')
<div class="container">
    <form action="{{ route('tarefas.update', ['tarefa' => $tarefa->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Novo nome</label>
        <input type="text" name="nome" value="{{ $tarefa->nome }}" class="form-control" placeholder="Insira a tarefa" required>
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>
    <div class="">
        @if(session()->has('message'))
        <div class="alerta">
            <p>{{ session('message') }}</p>
        </div>
        @endif
    </div>
</div>
@endsection


