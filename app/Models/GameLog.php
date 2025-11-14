<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GameLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'user_id',
        'action',
        'meta',
        'zone',
        'dinosaur'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
