<?php

namespace Database\Factories;

use App\Enums\GameAgeRatingEnum;
use App\Enums\GameGamemodeEnum;
use App\Enums\GameGenreEnum;
use App\Enums\GamePlatformEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'title' => $this->faker->text(50),
            'developer' => $this->faker->text(50),
            'publisher' => $this->faker->text(50),
            'date_released' => $this->faker->date(),
            'platform' => $this->faker->randomElement(GamePlatformEnum::cases()),
            'genre' => $this->faker->randomElement(GameGenreEnum::cases()),
            'description' => $this->faker->text(50),
            'gamemode' => $this->faker->randomElement(GameGamemodeEnum::cases()),
            'image' => $this->faker->imageUrl(),
            'age_rating' => $this->faker->randomElement(GameAgeRatingEnum::cases()),
            'user_id' => $this->faker->uuid(),
            'created_at' => $this->faker->date(),
        ];
    }
}
