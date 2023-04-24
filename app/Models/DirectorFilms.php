<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DirectorFilms extends Model
{
    use HasFactory;

    protected $table = 'director_films';

    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Film::class, 'directors', 'director_id', 'film_id');
    }
}
