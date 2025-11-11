<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Mostrar lista de usuarios (solo para admin)
     */
    public function index()
    {
        $users = User::all();
        return view('pages.admin', compact('users'));
    }

    /**
     * Eliminar usuario
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Evitar que un admin se elimine a sí mismo
        if (auth()->id() === $user->id) {
            return redirect()->route('users')->with('error', 'No puedes eliminarte a ti mismo.');
        }

        $user->delete();

        return redirect()->route('users')->with('success', 'Usuario eliminado correctamente.');
    }

    /**
     * Actualizar el rol de un usuario (admin / user)
     */
    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:admin,user',
        ]);

        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users')->with('success', 'Rol actualizado correctamente.');
    }
}
