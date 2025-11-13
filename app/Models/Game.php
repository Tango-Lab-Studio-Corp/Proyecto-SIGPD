<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    protected $fillable = 
    ['name'
    ,'code'
    ,'created_by'
    ,'status'
    ,'max_players'
    ,'creator_id'];

    public function players()
    {
        return $this->hasMany(PlayerGame::class);
    }

    public function creator()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }

    public function logs()
    {
        return $this->hasMany(GameLog::class);
    }
}
