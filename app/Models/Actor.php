<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Actor extends Model
{
    use HasFactory;
    protected $table = 'actors';

    protected $fillable = [
        'name',
    ];
    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Film::class, 'film_actors', 'actor_id', 'film_id');
    }
}
