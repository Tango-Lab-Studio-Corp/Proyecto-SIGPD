<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\PlayerGame;
use App\Models\GameLog;

class AdminGameController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index()
    {
        $games = Game::withCount('players')->latest()->paginate(20);
        return view('pages.admin.games', compact('games'));
    }

    public function show($id)
    {
        $game = Game::with('players.user','logs.user')->findOrFail($id);
        return view('pages.admin.show', compact('game'));
    }

    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();
        return redirect()->route('admin.games')->with('success','Partida eliminada');
    }
}
