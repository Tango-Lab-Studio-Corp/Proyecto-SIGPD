<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('game_logs', function (Blueprint $table) {
            $table->id();
            $table->string('zone');
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('dinosaur');
            $table->string('action');
            $table->timestamps();
            
        });

    }

    public function down(): void {
        Schema::dropIfExists('game_logs');
    }
};
