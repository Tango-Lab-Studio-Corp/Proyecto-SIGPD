@extends('layouts.app')

@section('content')
<div class="container py-5 text-center">
    <h1 class="mb-4">🎲 Lobby de partidas de Draftosaurus</h1>

    <a href="{{ route('games.create') }}" class="btn btn-primary mb-4">Crear nueva partida</a>

    @if($games->isEmpty())
        <p>No hay partidas activas aún.</p>
    @else
        <div class="row">
            @foreach($games as $game)
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm p-3">
                        <h5 class="card-title">{{ $game->name }}</h5>
                        <p class="card-text">
                            Estado: <strong>{{ ucfirst($game->status) }}</strong><br>
                            Creador: {{ $game->creator->name ?? 'Desconocido' }}
                        </p>
                        <a href="{{ route('games.show', $game) }}" class="btn btn-success">Entrar</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-3">
            {{ $games->links() }}
        </div>
    @endif
</div>
@endsection
