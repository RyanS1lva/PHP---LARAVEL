@extends('layouts.main')

@section('title', 'Registrar ponto')

@section('content')

<main>
    <div class="container">
      @if(count($marksToday) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">Entrada/Saída</th>
                  <th scope="col">Horário</th>
                </tr>
            </thead>
            <tbody>
                @foreach($marksToday as $mark)
                @can('view-mark', $mark)
                <tr>
                  <td>{{ $mark->entrada }}</td>
                  <td>{{ date("H:i:s d/m/Y", strtotime($mark->horario)) }}</td>
                </tr>
                @endcan
                @endforeach
            </tbody>
        </table>
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