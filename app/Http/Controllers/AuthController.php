<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Aquí podrías autenticar usando Auth::attempt($credentials)

        return redirect()->route('login'); // Por ahora solo redirige
    }
}

