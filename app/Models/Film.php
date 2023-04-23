<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Film extends Model
{
    use HasFactory;

    protected $table = 'films';

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites', 'film_id', 'user_id');
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'films_genres', 'film_id', 'genre_id');
    }

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class, 'films_actors', 'film_id', 'actor_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
