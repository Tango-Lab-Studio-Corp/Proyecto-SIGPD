<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('player_game', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained('games')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->json('zones')->nullable(); // JSON con puntajes por zona
            $table->integer('score')->default(0);
            $table->boolean('ready')->default(false);
            $table->timestamps();

            $table->unique(['game_id','user_id']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('player_game');
    }
};
