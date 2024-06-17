@extends('layouts.main')

@section('title', 'Home')

@section('content')
<form action="{{ route('tarefas.store') }}" method="post">
    <div class="container">
        <form>
          @csrf
            <div class="form-group">
              <label for="tarefa">Tarefa</label>
              <input type="text" name="tarefa" class="form-control" placeholder="Ex: Estudar" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar +</button>
          </form>
          @if(session()->has('message'))
          <div class="alerta">
            <p>{{ session('message') }}</p>
          </div>
          @endif
    </div>
</form>
@endsection