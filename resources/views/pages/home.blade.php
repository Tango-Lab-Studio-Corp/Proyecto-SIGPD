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
                <img src="" class="card-img-top" alt="Opción 1">
                <div class="card-body">
                    <h5 class="card-title">Opción 1</h5>
                    <p class="card-text">Descripción de la primera opción.</p>
                    <button class="btn btn-primary mt-3">Ver más</button>
                </div>
            </div>
        </div>

        <div class="col-md mb-4">
            <div class="card h-100 shadow">
                <img src="" class="card-img-top" alt="Opción 3">
                <div class="card-body">
                    <h5 class="card-title">Opción 3</h5>
                    <p class="card-text">Descripción de la tercera opción.</p>
                    <button class="btn btn-primary mt-3">Ver más</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
