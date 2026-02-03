<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->char('id', 36)->primary(true);
            $table->string('title', 255)->unique();
            $table->string('developer', 100);
            $table->string('publisher', 200);
            $table->date('date_released');
            $table->enum('platform', ['pc', 'playstation', 'xbox', 'nintendo', 'mobile', 'other']);
            $table->enum('genre', ['rpg', 'action', 'strategy', 'sports', 'adventure']);
            $table->text('description');
            $table->enum('gamemode', ['singleplayer', 'coop', 'multiplayer']);
            $table->string('image', 255);
            $table->enum('age_rating', ['PEGI', 'ESRB']); # TODO: Might not be accurate
            $table->decimal('rating', '2', 1)->default(0.0); // 0.0-5.0
            $table->char('user_id', 36);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
