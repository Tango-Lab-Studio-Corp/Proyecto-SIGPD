@extends('layouts.app')
@section('title','Crear partida')
@section('content')
<div class="container">
  <h2>Crear partida</h2>
  <form action="{{ route('games.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label>Nombre (opcional)</label>
      <input type="text" name="name" class="form-control" placeholder="Nombre de la partida">
    </div>
    <div class="mb-3">
      <label>Max jugadores</label>
      <select name="max_players" class="form-select">
        @for($i=2;$i<=8;$i++)
          <option value="{{ $i }}">{{ $i }}</option>
        @endfor
      </select>
    </div>
    <button class="btn btn-primary">Crear</button>
  </form>
</div>
@endsection
