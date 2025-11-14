<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\GameRules;

class GameController extends Controller
{
    public function show(Game $game)
    {
        $zones = [
            'Color Enjoyer', 'Pares O nada', 'Baccarat 3', 'Sufriendo del exito',
            'La mesa de las mil caras', 'La mesa abandonada', 'Zona de los perdedores'
        ];

        $playerLogs = GameLog::where('game_id', $game->id)
            ->where('user_id', Auth::id())
            ->get();

        $gameFinished = $game->status === 'finished';

        return view('pages.games.show', compact('game', 'zones', 'playerLogs', 'gameFinished'));
    }

    public function finish(Game $game)
    {
        $game->update(['status' => 'finished']);
        return redirect()->route('games.show', $game->id)->with('success', 'Partida finalizada.');
    }
    public function index()
{
    $games = Game::paginate(10);
    return view('pages.games.index', compact('games'));
}
public function create()
{
    return view('pages.games.create');
}
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $game = Game::create([
        'name' => $validated['name'],
        'status' => 'pending', // 👈 Cambiado de 'active' a 'pending'
        'creator_id' => auth()->id(),
    ]);

    return redirect()->route('games.show', $game->id)
                     ->with('success', 'Partida creada correctamente.');
}

public function addDino(Request $request, Game $game)
{
    $zone = $request->input('zone');
    $dinosaur = $request->input('dinosaur');
    $userId = Auth::id();

    $check = GameRules::canPlace($zone, $dinosaur, $userId, $game->id);

    if (!$check['allowed']) {
        return back()->with('error', $check['message']);
    }

    // Si pasa la validación
    GameLog::create([
        'game_id' => $game->id,
        'user_id' => $userId,
        'zone' => $zone,
        'dinosaur' => $dinosaur,
        'action' => 'add_dino',
    ]);

    return back()->with('success', 'Dinosaurio colocado correctamente!');
}
}
