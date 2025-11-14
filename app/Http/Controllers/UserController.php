<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Inicio() {
        return view("home.blade.php");
    }
    public function users()
{
    $this->authorizeAdmin();

    $users = User::all();
    return view('pages.users', compact('users'));
}

public function deleteUser($id)
{
    $this->authorizeAdmin();

    $user = User::findOrFail($id);

    // Evita que el admin se elimine a sí mismo
    if ($user->id === auth()->id()) {
        return back()->withErrors('No puedes eliminar tu propio usuario.');
    }

    $user->delete();
    return back()->with('success', 'Usuario eliminado correctamente.');
}

public function updateRole(Request $request, $id)
{
    $this->authorizeAdmin();

    $user = User::findOrFail($id);
    $request->validate([
        'role' => 'required|in:admin,user',
    ]);

    $user->role = $request->role;
    $user->save();

    return back()->with('success', 'Rol actualizado correctamente.');
}

private function authorizeAdmin()
{
    if (auth()->user()->role !== 'admin') {
        abort(403, 'Acceso denegado');
    }
}

}
