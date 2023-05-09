<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use \App\Models\Actor;
use \App\Models\Comment;
use \App\Models\Favorite;
use \App\Models\Film;
use \App\Models\FilmActor;
use \App\Models\FilmGenres;
use \App\Models\Genre;
use \App\Models\User;
use \App\Models\Director;
use \App\Models\DirectorFilms;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        Film::factory(10)->create();
        Actor::factory(30)->create();
        User::factory(10)->create();
        Genre::factory(10)->create();

        FilmActor::factory()
            ->count(50)
            ->state(new Sequence(
                fn ($sequence) => ['film_id' => Film::all()->random(), 'actor_id' => Actor::all()->random()],
            ))
            ->create();

        FilmGenres::factory()
            ->count(50)
            ->state(new Sequence(
                fn ($sequence) => ['film_id' => Film::all()->random(), 'genre_id' => Genre::all()->random()],
            ))
            ->create();

        Comment::factory()
            ->count(50)
            ->state(new Sequence(
                fn ($sequence) => ['film_id' => Film::all()->random(), 'user_id' => User::all()->random()],
            ))
            ->create();

        Favorite::factory(30)
            ->count(50)
            ->state(new Sequence(
                fn ($sequence) => ['film_id' => Film::all()->random(), 'user_id' => User::all()->random()],
            ))
            ->create();

        Director::factory(10)->create();
        DirectorFilms::factory(10)
            ->count(10)
            ->state(new Sequence(
                fn ($sequence) => ['film_id' => Film::all()->random(), 'director_id' => Director::all()->random()],
            ))
            ->create();
    }
}
