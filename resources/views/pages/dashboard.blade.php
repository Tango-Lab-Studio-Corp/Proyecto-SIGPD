@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container text-center">
    <h2 class="mb-4">Bienvenido, {{ $user->name }} 👋</h2>

    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h4 class="card-title mb-3">Tus datos</h4>

            <table class="table table-bordered text-center">
                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nombre</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Rol</th>
                        <td>{{ ucfirst($user->role ?? 'usuario') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
