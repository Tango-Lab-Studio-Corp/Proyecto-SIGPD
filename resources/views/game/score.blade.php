{{-- resources/views/game/score.blade.php --}}
@extends('layouts.app')

@section('title', 'Calculadora de Puntos - High Card Enjoyer')

@section('content')
<div class="container py-4" id="scoreApp">


    <!-- Ingreso de jugador -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-6">
            <div class="card bg-dark text-white border-warning shadow-lg">
                <div class="card-body text-center">
                    <h4 class="mb-3">Ingresa tu nombre</h4>
                    <input type="text" id="playerName" class="form-control bg-secondary text-white text-center mb-3" placeholder="Ej: Juan Pérez">
                    <button id="startBtn" class="btn btn-warning btn-lg w-100">COMENZAR PARTIDA</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tablero (oculto hasta ingresar nombre) -->
    <div id="gameBoard" class="d-none">
        <!-- Mano del jugador -->
        <div class="card bg-dark text-white border-warning mb-4 shadow">
            <div class="card-header bg-warning text-dark fw-bold text-center">
                TU MANO (6 fichas)
            </div>
            <div class="card-body">
                <div id="playerHand" class="d-flex justify-content-center gap-3 flex-wrap p-3"></div>
            </div>
        </div>

        <!-- Tablero 3+3 -->
        <div class="row g-4">
            <!-- IZQUIERDA -->
            <div class="col-lg-5">
                @include('partials.zone', ['id' => 'color-enjoyer', 'title' => 'Color Enjoyer', 'rule' => 'Fichas iguales = +puntos'])
                @include('partials.zone', ['id' => 'pares-o-nada', 'title' => 'Pares o Nada', 'rule' => '5 pts por par completo'])
                @include('partials.zone', ['id' => 'baccarat-3', 'title' => 'Baccarat 3', 'rule' => '5 pts si hay 3 fichas'])
            </div>

            <!-- CENTRO -->
            <div class="col-lg-2 d-flex align-items-center justify-content-center">
                <div class="central-divider">
                    <div class="vs-text neon-text">VS</div>
                </div>
            </div>

            <!-- DERECHA -->
            <div class="col-lg-5">
                @include('partials.zone', ['id' => 'sufriendo-exito', 'title' => 'Sufriendo del Éxito', 'rule' => '7 pts si 1 ficha única'])
                @include('partials.zone', ['id' => 'mesa-mil-caras', 'title' => 'Mesa de las Mil Caras', 'rule' => '+1 por valor distinto'])
                @include('partials.zone', ['id' => 'mesa-abandonada', 'title' => 'Mesa Abandonada', 'rule' => '7 pts si no hay otra igual'])
            </div>
        </div>

        <!-- Zona de los perdedores -->
        <div class="losers-zone mt-4">
            @include('partials.losers-zone')
        </div>

        <!-- Puntuación + Guardar -->
        <div class="text-center mt-5">
            <div class="d-inline-block p-5 bg-dark border-warning rounded-4 shadow-lg">
                <h2 class="neon-text mb-3">Puntuación: <span id="currentScore">0</span> pts</h2>
                <button id="saveScore" class="btn btn-success btn-lg px-5">GUARDAR EN RANKING</button>
            </div>
        </div>
    </div>

    <!-- Ranking -->
    <div class="mt-5">
        <h2 class="text-center neon-text mb-4">RANKING DE GANADORES</h2>
        <div id="rankingList" class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Cargado por JS -->
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('css/score.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('js/score.js') }}"></script>
@endpush