<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlayerGame extends Model
{
    use HasFactory;

    protected $table = 'player_game';

    protected $fillable = ['game_id','user_id','zones','score','ready'];

    protected $casts = [
        'zones' => 'array',
        'ready' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
