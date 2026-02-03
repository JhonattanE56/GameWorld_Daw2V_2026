<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
