@extends('layouts.app')

@section('title', 'Panel de Administración')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="m-0">Panel de Administración</h2>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
            ← Volver al Dashboard
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form action="{{ route('users.updateRole', $user->id) }}" method="POST" class="d-flex justify-content-center align-items-center gap-2">
                                        @csrf
                                        <select name="role" class="form-select form-select-sm w-auto">
                                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Usuario</option>
                                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-outline-primary">Guardar</button>
                                    </form>
                                </td>
                                <td>
                                    @if(auth()->id() !== $user->id)
                                        <form action="{{ route('users.delete', $user->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    @else
                                        <button class="btn btn-sm btn-secondary" disabled>Tu cuenta</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
