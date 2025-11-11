{{-- resources/views/guia.blade.php --}}
@extends('layouts.app')

@section('title', 'Guía - High Card Enjoyer')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-5 display-4 fw-bold">Guía Completa de High Card Enjoyer</h1>

    <div class="row g-4">
        <!-- Sección 1: ¿Qué es? -->
        <div class="col-lg-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="card-title text-primary">¿Qué es High Card Enjoyer?</h3>
                    <p class="card-text">
                        <strong>¡Bienvenido a High Card Enjoyer, el casino más exclusivo de la ciudad!</strong><br>
                        Tu objetivo es crear la colección más prestigiosa de fichas en tu vitrina de jugador.
                        Cada ficha pertenece a una familia de color o tipo de apuesta, y tendrás que colocarlas estratégicamente para ganar más puntos que tus rivales.
                    </p>
                </div>
            </div>
        </div>

        <!-- Sección 2: Componentes -->
        <div class="col-lg-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="card-title text-success">📦 Componentes</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">5 Mesas</li>
                        <li class="list-group-item">60 Fichas (6 tipos)</li>
                        <li class="list-group-item">1 dado (Pinko)</li>
                        <li class="list-group-item">1 bolsa de tela</li>
                        
                    </ul>
                </div>
            </div>
        </div>

        <!-- Sección 3: Preparación -->
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="card-title text-info">⚙️ Preparación Rápida</h3>
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item">Cada jugador recibe una mesa y lo coloca frente a sí.</li>
                        <li class="list-group-item">Colocá todas las fichas en la bolsa y mezclalas bien.</li>
                        <li class="list-group-item">Cada jugador extrae 6 fichas al azar de la bolsa y las mantiene ocultas.</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Sección 4: Especies de Dinosaurios -->
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="card-title text-warning">🪙 Fichas (6 tipos)</h3>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Dealer</strong> (rojo) Bonus +1/área</li>
                        <li class="list-group-item"><strong>As</strong> (verde)</li>
                        <li class="list-group-item"><strong>Pica</strong> (azul)</li>
                        <li class="list-group-item"><strong>Trebol</strong> (amarillo)</li>
                        <li class="list-group-item"><strong>Corazon</strong> (naranja)</li>
                        <li class="list-group-item"><strong>Rombo</strong> (expansión)</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Sección 5: Cómo Jugar (Resumen) -->
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="card-title text-danger">🎮 Pasos del Juego</h3>
                    <p class="card-text">
                        <strong>2 rondas (4 en 2 jugadores)</strong>, 6 turnos/ronda:<br>
                        1. Roba <strong>6 Fichas</strong> de la bolsa.<br>
                        2. <strong>Tira del Pinko</strong> (restricción colocación, excepto lanzador).<br>
                        3. Elige 1 Ficha, colócala (o río).<br>
                        4. <strong>Pasa resto a la izquierda</strong>.<br>
                        <strong>Total: 12 Fichas por mesa.</strong><grok-card data-id="defb96" data-type="citation_card"></grok-card><grok-card data-id="8a5dac" data-type="citation_card"></grok-card>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="{{ route('home') }}" class="btn btn-outline-primary btn-lg">← Volver al Inicio</a>
    </div>
</div>
@endsection