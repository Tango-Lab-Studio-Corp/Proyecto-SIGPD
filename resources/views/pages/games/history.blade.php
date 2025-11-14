@extends('layouts.app')
@section('title','Mi historial')
@section('content')
<div class="container">
  <h2>Historial</h2>
  @foreach($playerGames as $pg)
    <div class="card mb-2">
      <div class="card-body">
        <h5>{{ $pg->game->name ?? "Partida {$pg->game->code}" }}</h5>
        <p>Fecha: {{ $pg->created_at->format('d/m/Y H:i') }}</p>
        <p>Puntaje: {{ $pg->score }}</p>
        <a href="{{ route('games.show', $pg->game->id) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
      </div>
    </div>
  @endforeach
  <div class="mt-3">{{ $playerGames->links() }}</div>
</div>
@endsection
