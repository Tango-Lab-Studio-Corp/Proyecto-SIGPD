{{-- resources/views/guia.blade.php --}}
@extends('layouts.app')

@section('title', 'Reglas - High Card Enjoyer')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-5 display-4 fw-bold">Reglas Completa de High Card Enjoyer</h1>

    <div class="row g-4">
        <!-- Sección 1: ¿Qué es? -->
        <div class="col-lg-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="card-title text-primary">Explicacion del dado</h3>
                    <p class="card-text">
                        El dado es una maquina de <strong>plinko</strong>, en esta maquina se deja caer una bola y esta rebota contra los bloqueos que hay en el camino hacia abajo, causando que el resultado sea completamente aleatorio.
                        <br>                        <br>  
                        <strong> Sala de juegos:</strong> Se pueden colocar fichas en la zona izquierda del tablero.
                        <br>                        <br>
                        <strong>Zona VIP:</strong> Se pueden colocar fichas en la zona derecha del tablero.
                        <br>                        <br>
                        <strong>Juegos recreativos:</strong> Se pueden poner fichas en las zonas Color enjoyer, Pares o nada y Sufriendo del éxito.
                        <br>                        <br>
                        <strong> Zona de apuestas:</strong> Se pueden colocar fichas en las zonas Baccarat 3, La mesa de las mil caras y La mesa abandonada.
                        <br>                        <br>
                        <strong>Mesa vacía:</strong> Se debe colocar una ficha en una mesa vacía.
                        <br>                        <br>
                        <strong>Apuesta baja:</strong> Se debe colocar una ficha en una mesa sin una ficha negra.
                    </p>
                </div>
            </div>
        </div>

        <!-- Sección 2: Componentes -->
        <div class="col-lg-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="card-title text-success">Video explicativo</h3>
                    <ul class="list-group list-group-flush">
                        <center><a href="https://youtu.be/coSP81ETWCg">
                        <img id="mainImage"
                        src="{{ Vite::asset('resources/images/Titulo-Negro.png') }}"
                        class="img-fluid main-img mb-4"
                        alt="Imagen principal"></a></center>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Sección 3: Preparación -->
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="card-title text-info">Explicacion de las Zonas</h3>
                   
                </div>
            </div>
        </div>

        <!-- Sección 4: Especies de Dinosaurios -->
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="card-title text-warning">Zona Izquierda</h3>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Color enjoyer:</strong>En esta mesa deben haber fichas iguales para incrementar la cantidad de puntos obtenida</li>
                        <li class="list-group-item"><strong>Pares o nada:</strong>Se obtienen 5 puntos por cada par de fichas iguales en esta mesa</li>
                        <li class="list-group-item"><strong>Baccarat 3:</strong>Se obtienen 5 puntos si hay exactamente 3 fichas en esta mesa</li>

                    </ul>
                </div>
            </div>
        </div>

        <!-- Sección 5: Cómo Jugar (Resumen) -->
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="card-title text-danger">Zona Derecha</h3>
                   <ul class="list-group">
                        <li class="list-group-item"><strong>Sufriendo del exito</strong>Solo puede haber una ficha en esta mesa, se obtienen 7 puntos si ningún otro jugador tiene más fichas del mismo valor que tú.</li>
                        <li class="list-group-item"><strong>La mesa de las mil caras</strong>Se deben poner fichas de distinto valor para incrementar la cantidad de puntos obtenida</li>
                        <li class="list-group-item"><strong>La mesa abandonada</strong>Se obtienen 7 puntos si no hay ninguna ficha del mismo tipo en todo el tablero</li>
                        <li class="list-group-item"><strong>Zona de los perdedores</strong>En esta zona se puede colocar cualquier ficha sin importar lo que muestre el dado, sin embargo estas solo daran 1 punto por cada ficha en esta zona.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="{{ route('home') }}" class="btn btn-outline-primary btn-lg">← Volver al Inicio</a>
    </div>
</div>
@endsection