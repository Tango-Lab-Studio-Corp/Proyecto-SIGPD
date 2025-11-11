@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm rounded-4 border-0">
            <div class="card-body p-4">
                <h3 class="text-center mb-4">Iniciar Sesión</h3>

                {{-- Mostrar errores --}}
                @if($errors->any())
                    <div class="alert alert-danger text-center py-2">
                        {{ $errors->first() }}
                    </div>
                @endif

                {{-- Formulario de inicio de sesión --}}
                <form method="POST" action="{{ route('login.submit') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input 
                            type="email" 
                            class="form-control" 
                            name="email" 
                            id="email" 
                            placeholder="tu@correo.com" 
                            required 
                            autofocus
                        >
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input 
                            type="password" 
                            class="form-control" 
                            name="password" 
                            id="password" 
                            placeholder="••••••••" 
                            required
                        >
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                </form>

                <div class="text-center mt-3">
                    <p>¿No tenés cuenta? 
                        <a href="{{ route('register') }}" class="text-decoration-none">
                            Registrate
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
