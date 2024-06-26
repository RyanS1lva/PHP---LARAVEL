@extends('layouts.main')

@section('title', 'Registrar ponto')

@section('content')

<main>
    <div class="container">
      {{-- Verifica se tem pontos registrados no dia para exibir a tabela. --}}
      @if(count($marksToday) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">Entrada/Saída</th>
                  <th scope="col">Horário</th>
                </tr>
            </thead>
            <tbody>
              {{-- Exibe os pontos registrados no dia retornados pelo controller --}}
                @foreach($marksToday as $mark)
                {{-- Permite ao usuário visualizar somente os seus próprios registros --}}
                @can('view-mark', $mark)
                <tr>
                  <td>{{ $mark->entrada }}</td>
                  <td>{{ date("H:i:s d/m/Y", strtotime($mark->horario)) }}</td>
                </tr>
                @endcan
                @endforeach
            </tbody>
        </table>
        {{-- Caso não tenha nenhum registro no dia é exibido o texto ao invés de exibir a tabela --}}
      @else 
        <p>Nenhum registro encontrado.</p>
      @endif
          <form action="{{ route('mark.store') }}" method="post">
            @csrf
            <button type="submit" class="button-mark">Registrar</button>
          </form>
    </div>
</main>

@endsection