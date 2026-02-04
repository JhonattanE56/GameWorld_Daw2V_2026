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
        // TODO: Add to users

        // Games autoincremental
        Schema::table('games', function (Blueprint $table) {
            $table->unsignedInteger('num')->unique()->after('id');
        });
        DB::statement('ALTER TABLE `games` MODIFY `num` INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE');
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
