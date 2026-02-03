<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;
    use HasUuids;
    use SoftDeletes;
    public $incrementing = false;
    public $keyType = 'string';
    protected $fillable = [
        'user_id',
        'game_id',
        'title',
        'comment',
    ];
}
