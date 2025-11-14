@extends('layouts.app')

@section('title', 'High Card Enjoyer')

@section('content')
<div class="text-center my-5">
    <img id="mainImage"
         src="{{ Vite::asset('resources/images/Titulo-Negro.png') }}"
         class="img-fluid main-img mb-4"
         alt="Imagen principal">

    <div class="row g-4">
        <div class="col-md-7 mb-4">
            <div class="card h-100 shadow">
                <img src="" class="card-img-top" alt="Video">
                <div class="card-body">
                    <h5 class="card-title">Trailer</h5>
                    <p class="card-text">Trailer del juego en ingles</p>
                    <button class="btn btn-primary mt-3">Ver mas</button>
                </div>
            </div>
        </div>

        <div class="col-md mb-4">
            <div class="card h-100 shadow">
                <img src="" class="card-img-top" alt="Imagen del juego">
                <div class="card-body">
                    <h5 class="card-title">Juega ahora</h5>
                    <p class="card-text"></p>
                    <button class="btn btn-primary mt-3">Pruebalo ahora</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
