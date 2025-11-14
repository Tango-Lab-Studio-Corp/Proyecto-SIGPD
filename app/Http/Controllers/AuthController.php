<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Mostrar vista de login
    public function showLogin()
    {
        return view('pages.login');
    }

    // Mostrar vista de registro
    public function showRegister()
    {
        return view('pages.register');
    }

    // Registrar usuario
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // El primer usuario será admin automáticamente
        $role = User::count() === 0 ? 'admin' : 'user';

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    // Iniciar sesión
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no son válidas.',
        ]);
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Dashboard del usuario
   public function dashboard()
{
    $user = auth()->user(); // obtiene el usuario autenticado
    return view('pages.dashboard', compact('user'));
}


    // Panel de administración: lista de usuarios
    public function users()
    {
        $this->authorizeAdmin();
        $users = User::all();

        return view('pages.users', compact('users'));
    }

    // Eliminar usuario
    public function deleteUser($id)
    {
        $this->authorizeAdmin();

        if (Auth::id() == $id) {
            return back()->with('error', 'No puedes eliminar tu propia cuenta.');
        }

        User::findOrFail($id)->delete();

        return back()->with('success', 'Usuario eliminado correctamente.');
    }

    // Actualizar rol de usuario
    public function updateRole(Request $request, $id)
    {
        $this->authorizeAdmin();

        $request->validate([
            'role' => 'required|in:user,admin',
        ]);

        $user = User::findOrFail($id);

        if (Auth::id() == $user->id) {
            return back()->with('error', 'No puedes cambiar tu propio rol.');
        }

        $user->role = $request->role;
        $user->save();

        return back()->with('success', 'Rol actualizado correctamente.');
    }

    // Verificación de permisos admin
    private function authorizeAdmin()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Acceso denegado');
        }
    }
}
