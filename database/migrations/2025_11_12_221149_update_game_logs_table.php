use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('game_logs', function (Blueprint $table) {
            if (!Schema::hasColumn('game_logs', 'zone')) {
                $table->string('zone')->nullable();
            }
            if (!Schema::hasColumn('game_logs', 'dinosaur')) {
                $table->string('dinosaur')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('game_logs', function (Blueprint $table) {
            $table->dropColumn(['zone', 'dinosaur']);
        });
    }
};
