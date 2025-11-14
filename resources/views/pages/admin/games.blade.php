@extends('layouts.app')
@section('title','Panel de Partidas')
@section('content')
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Partidas</h2>
  </div>

  @foreach($games as $g)
    <div class="card mb-2">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <h5>{{ $g->name ?? $g->code }}</h5>
          <p>{{ $g->players_count }} jugadores — {{ ucfirst($g->status) }}</p>
        </div>
        <div>
          <a href="{{ route('admin.games.show', $g->id) }}" class="btn btn-outline-secondary">Ver</a>
          <form action="{{ route('admin.games.destroy', $g->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Eliminar partida?')">
            @csrf @method('DELETE')
            <button class="btn btn-danger">Eliminar</button>
          </form>
        </div>
      </div>
    </div>
  @endforeach

  <div class="mt-3">{{ $games->links() }}</div>
</div>
@endsection
