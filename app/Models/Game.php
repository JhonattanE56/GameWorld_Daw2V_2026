<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    /** @use HasFactory<\Database\Factories\GameFactory> */
    use HasFactory;
    use HasUuids;
    use SoftDeletes;
    public $incrementing = false;
    public $keyType = 'string';
    protected $fillable = [
        'title',
        'developer',
        'publisher',
        'date_released',
        'platform',
        'genre',
        'description',
        'gamemode',
        'image',
        'age_rating',
        'rating',
        'user_id',
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    // Custom functions
    public function updateAverageRating(): void
    {
        $rating = $this->ratings()->average('rating') ?? 0.0;
        $this->update(['rating' => $rating]);
    }
}
