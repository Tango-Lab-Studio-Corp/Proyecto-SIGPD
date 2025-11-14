@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Resultados de {{ $game->name }}</h2>

    @if (empty($players))
        <div class="alert alert-info">No hay movimientos registrados para esta partida.</div>
        <a href="{{ route('games.show', $game) }}" class="btn btn-secondary mt-2">Volver a la partida</a>
        @return
    @endif

    <div class="row">
        @foreach ($players as $player)
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $player['user']->name ?? 'Jugador #' . $player['user_id'] }}
                        </h5>

                        <p class="mb-2"><strong>Puntaje:</strong> {{ $player['score'] }}</p>

                        <ul class="list-group mb-2">
                            @if (!empty($player['dinos']))
                                @foreach ($player['dinos'] as $zone => $dino)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>{{ $zone }}</span>
                                        <span class="badge bg-primary">{{ $dino }}</span>
                                    </li>
                                @endforeach
                            @else
                                <li class="list-group-item">No colocó dinosaurios.</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('games.index') }}" class="btn btn-secondary">Volver al lobby</a>
    </div>
</div>
@endsection
