<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('game_logs', function (Blueprint $table) {
        $table->string('zone')->nullable();
        $table->string('dinosaur')->nullable();
    });
}

    public function down(): void
    {
        Schema::table('game_logs', function (Blueprint $table) {
            $table->dropColumn(['zone', 'dinosaur']);
        });
    }
};
