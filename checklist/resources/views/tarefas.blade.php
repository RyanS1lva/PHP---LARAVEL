@extends('layouts.main')

@section('title', 'Tarefas')

@section('content')
<div class="tarefas-container">
    <table class="table" id="tabela-check">
        <thead>
          <tr>
            <th scope="col">Nº</th>
            <th scope="col">Nome</th>
            <th scope="col">Editar</th>
            <th scope="col">Finalizar</th>
            <th scope="col">Editado em</th>
          </tr>
        </thead>
        <tbody>
        @php
            $contador = 1;
        @endphp
        @foreach($tarefas as $tarefa)
          <tr>
            <th scope="row">{{ $contador }}</th>
            <td>{{ $tarefa->nome }}</td>
              <td>
                <form action="{{ route('tarefas.edit', ['tarefa' => $tarefa])}}" method="get">
                  @csrf
                  <button type="submit" class="btn btn-info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                </button>
                </form>
              </td>
            <form action="{{ route('tarefas.destroy', ['tarefa' => $tarefa->id]) }}" method="post">
              @csrf
              @method('DELETE')
              <td><button type="submit" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                  <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z"/>
                  <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0"/>
                </svg>  
              </button></td>
            </form>
            <td>{{ $tarefa->updated_at }}</td>
          </tr>
          @php
            $contador++;
          @endphp
        @endforeach
        </tbody>
      </table>
</div>
@endsection