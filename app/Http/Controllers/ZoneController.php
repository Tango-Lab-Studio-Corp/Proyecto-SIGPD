<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZoneController extends Controller
{
    public function addDinosaur(Request $request, Game $game, $zone)
    {
        $request->validate([
            'dinosaur' => 'required|string|max:50',
        ]);

        GameLog::create([
            'game_id'   => $game->id,
            'user_id'   => Auth::id(),
            'zone'      => $zone,
            'dinosaur'  => $request->input('dinosaur'),
            'action'    => 'add_dino',
        ]);

        return redirect()->route('games.show', $game->id)->with('success', 'Dinosaurio agregado con éxito.');
    }
}
