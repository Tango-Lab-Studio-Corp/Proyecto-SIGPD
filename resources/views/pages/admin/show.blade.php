@extends('layouts.app')
@section('title','Detalle de partida')
@section('content')
<div class="container">
  <h2>Partida: {{ $game->name ?? $game->code }}</h2>
  <p>Estado: {{ ucfirst($game->status) }}</p>

  <h4>Jugadores</h4>
  <ul class="list-group mb-3">
    @foreach($game->players as $p)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $p->user->name }} <span class="badge bg-secondary">{{ $p->score }}</span>
      </li>
    @endforeach
  </ul>

  <h4>Registro</h4>
  <ul class="list-group">
    @foreach($game->logs as $l)
      <li class="list-group-item">
        {{ $l->created_at->format('d/m H:i') }} — {{ $l->action }} @if($l->user) ({{ $l->user->name }}) @endif
      </li>
    @endforeach
  </ul>
</div>
@endsection
