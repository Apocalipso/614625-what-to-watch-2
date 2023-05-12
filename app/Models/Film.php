<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Film extends Model
{
    use HasFactory;

    public const PENDING = 'pending';
    public const ON_MODERATION = 'on moderation';
    public const READY = 'ready';

    protected $table = 'films';

    protected $fillable = [
        'title',
        'poster_image',
        'description',
        'director',
        'run_time',
        'released',
        'imdb_id',
        'status',
        'video_link',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites', 'film_id', 'user_id');
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'film_genres', 'film_id', 'genre_id')->withTimestamps();
    }

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class, 'film_actors', 'film_id', 'actor_id')->withTimestamps();;
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function directors(): HasMany
    {
        return $this->hasMany(Director::class);
    }

    public function getRating(): float
    {
        return round($this->comments->avg('rating'), 1);
    }
}
