@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4">{{ $game->name }}</h2>

    @if($gameFinished)
        <div class="alert alert-success text-center">
            🏆 La partida ha finalizado.
        </div>
    @else
        <div class="alert alert-info text-center">
            Estado: <strong>{{ ucfirst($game->status) }}</strong>
        </div>
    @endif

    {{-- TABLERO DE ZONAS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-5">
        @foreach($zones as $zone)
            <div class="card p-3 shadow rounded-xl bg-light">
                <h4 class="text-lg font-semibold text-center mb-2">{{ $zone }}</h4>

                {{-- Dinosaurios en la zona --}}
                <ul class="list-unstyled mb-3">
                    @php
                        $dinosInZone = $playerLogs->where('zone', $zone);
                    @endphp
                    @forelse($dinosInZone as $log)
                        <li class="bg-white rounded px-2 py-1 mb-1 shadow-sm text-center">
                           {{ $log->dinosaur }}
                        </li>
                    @empty
                        <li class="text-center text-muted">Sin Fichas</li>
                    @endforelse
                </ul>

                @if(!$gameFinished)
                <form method="POST" action="{{ route('zones.add', [$game->id, $zone]) }}">
                    @csrf
                    <div class="input-group">
                        <select name="dinosaur" class="form-select" required>
                            <option value="" selected disabled>Seleccionar dinosaurio</option>
                            <option value="⛃ Dealer">⛃ Dealer</option>
                            <option value="🂡 As">🂡 As</option>
                            <option value="♣️ Trebol">♣️ Trebol</option>
                            <option value="♠️ Pica">♠️ Pica</option>
                            <option value="♦️ Rombo">♦️ Rombo</option>
                            <option value="♥️ Corazon">♥️ Corazon</option>
                        </select>
                        <button type="submit" class="btn btn-success ms-2">Agregar</button>
                    </div>
                </form>
                @endif
            </div>
        @endforeach
    </div>

    {{-- Finalizar partida --}}
    @if(!$gameFinished)
        <form method="POST" action="{{ route('games.finish', $game->id) }}" class="text-center">
            @csrf
            <button type="submit" class="btn btn-danger px-4 py-2 mt-3">Finalizar partida</button>
        </form>
    @endif

    {{-- RESULTADOS --}}
    @if($gameFinished)
        <div class="mt-5 text-center">
            <h3>Resultados finales</h3>
            <p>Recuento de puntos basado en zonas y fichas.</p>

            @php
                $score = $playerLogs->count() * 5;
            @endphp

            <h4>Tu puntuación total: <strong>{{ $score }}</strong> 🏅</h4>
        </div>
    @endif
</div>
@endsection
