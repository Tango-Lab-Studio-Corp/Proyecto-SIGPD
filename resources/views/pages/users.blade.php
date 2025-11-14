@extends('layouts.app')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-center">Gestión de Usuarios</h2>

    {{-- Mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tabla de usuarios --}}
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="text-center">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            {{-- Formulario para cambiar rol --}}
                            <form action="{{ route('users.updateRole', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                <select name="role" class="form-select form-select-sm d-inline w-auto" onchange="this.form.submit()">
                                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Usuario</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            {{-- Botón para eliminar usuario --}}
                            @if (Auth::id() !== $user->id)
                                <form action="{{ route('users.delete', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
                                        Eliminar
                                    </button>
                                </form>
                            @else
                                <span class="text-muted">Tu cuenta</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
