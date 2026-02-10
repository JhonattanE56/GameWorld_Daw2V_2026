<?php

namespace Database\Seeders;

use App\Enums\GameAgeRatingEnum;
use App\Enums\GameGamemodeEnum;
use App\Enums\GameGenreEnum;
use App\Enums\GamePlatformEnum;
use App\Helpers\CustomFunctions;
use App\Models\Game;
use App\Models\User;
use Database\Factories\GameFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_id = User::where('email', 'admin@admin.com')->firstOrFail()->id;

        $games = [
            [
                'title' => 'Doom',
                'developer' => 'id Software',
                'publisher' => 'id Software',
                'date_released' => '1993-12-10',
                'description' => 'Classic sci‑fi horror FPS set on Mars and in Hell.',
                'image' => 'https://example.com/images/doom-1993.jpg',
                'user_id' => $admin_id,
                'created_at' => now(),
            ],
            [
                'title' => 'Doom II: Hell on Earth',
                'developer' => 'id Software',
                'publisher' => 'id Software',
                'date_released' => '1994-09-30',
                'description' => 'Sequel FPS taking the demon invasion back to Earth.',
                'image' => 'https://example.com/images/doom-2.jpg',
                'user_id' => $admin_id,
                'created_at' => now(),
            ],
            [
                'title' => 'Super Mario Bros.',
                'developer' => 'Nintendo',
                'publisher' => 'Nintendo',
                'date_released' => '1985-09-13',
                'description' => 'Side‑scrolling platformer starring Mario in the Mushroom Kingdom.',
                'image' => 'https://example.com/images/super-mario-bros.jpg',
                'user_id' => $admin_id,
                'created_at' => now(),
            ],
            [
                'title' => 'Super Mario Bros. 3',
                'developer' => 'Nintendo',
                'publisher' => 'Nintendo',
                'date_released' => '1988-10-23',
                'description' => 'Mario travels across themed worlds to stop Bowser.',
                'image' => 'https://example.com/images/super-mario-bros-3.jpg',
                'user_id' => $admin_id,
                'created_at' => now(),
            ],
            [
                'title' => 'Super Mario 64',
                'developer' => 'Nintendo',
                'publisher' => 'Nintendo',
                'date_released' => '1996-06-23',
                'description' => 'Pioneering 3D platformer set in Princess Peach’s castle.',
                'image' => 'https://example.com/images/super-mario-64.jpg',
                'user_id' => $admin_id,
                'created_at' => now(),
            ],
            [
                'title' => 'The Legend of Zelda',
                'developer' => 'Nintendo',
                'publisher' => 'Nintendo',
                'date_released' => '1986-02-21',
                'description' => 'Top‑down action‑adventure in the land of Hyrule.',
                'image' => 'https://example.com/images/zelda-1.jpg',
                'user_id' => $admin_id,
                'created_at' => now(),
            ],
            [
                'title' => 'The Legend of Zelda: A Link to the Past',
                'developer' => 'Nintendo',
                'publisher' => 'Nintendo',
                'date_released' => '1991-11-21',
                'description' => 'SNES action‑adventure featuring light and dark worlds.',
                'image' => 'https://example.com/images/zelda-a-link-to-the-past.jpg',
                'user_id' => $admin_id,
                'created_at' => now(),
            ],
            [
                'title' => 'The Legend of Zelda: Breath of the Wild',
                'developer' => 'Nintendo',
                'publisher' => 'Nintendo',
                'date_released' => '2017-03-03',
                'description' => 'Open‑world adventure across Hyrule on Nintendo Switch and Wii U.',
                'image' => 'https://example.com/images/zelda-botw.jpg',
                'user_id' => $admin_id,
                'created_at' => now(),
            ],
            [
                'title' => 'Counter-Strike 1.6',
                'developer' => 'Valve',
                'publisher' => 'Valve',
                'date_released' => '2003-09-15',
                'description' => 'Team‑based tactical FPS with terrorists vs. counter‑terrorists.',
                'image' => 'https://example.com/images/counter-strike-1-6.jpg',
                'user_id' => $admin_id,
                'created_at' => now(),
            ],
            [
                'title' => 'Minecraft',
                'developer' => 'Mojang Studios',
                'publisher' => 'Mojang Studios',
                'date_released' => '2011-11-18',
                'description' => 'Block‑based sandbox game with survival and creative modes.',
                'image' => 'https://example.com/images/minecraft.jpg',
                'user_id' => $admin_id,
                'created_at' => now(),
            ],
            [
                'title' => 'Terraria',
                'developer' => 'Re-Logic',
                'publisher' => 'Re-Logic',
                'date_released' => '2011-05-16',
                'description' => '2D sandbox action‑adventure with exploration, building, and combat.',
                'image' => 'https://example.com/images/terraria.jpg',
                'user_id' => $admin_id,
                'created_at' => now(),
            ],
        ];

        foreach ($games as $gameData) {
            Game::factory()->create($gameData);
        }
    }
}
