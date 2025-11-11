<?php
// app/Http/Controllers/ScoreController.php
namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller {
    public function index() {
        return Score::orderByDesc('score')
                    ->orderByDesc('created_at')
                    ->take(15)
                    ->get();
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:50',
            'score' => 'required|integer|min:0'
        ]);
        return Score::create($request->only(['name', 'score']));
    }
}