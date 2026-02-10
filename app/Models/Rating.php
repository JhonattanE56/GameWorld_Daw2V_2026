<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    /** @use HasFactory<\Database\Factories\RatingFactory> */
    use HasFactory;
    use HasUuids;
    use SoftDeletes;
    public $incrementing = false;
    public $keyType = 'string';
    protected $fillable = [
        'user_id',
        'game_id',
        'score',
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }
}
