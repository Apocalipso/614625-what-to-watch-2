<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Models\Actor;
use \App\Models\Comment;
use \App\Models\Film;
use \App\Models\Genre;
use \App\Models\User;
use Database\Seeders\DatabaseSeeder;
class RelationTest extends TestCase
{
    use RefreshDatabase;

    public function test_relation(): void
    {
        $databaseSeeder = new DatabaseSeeder;
        $databaseSeeder->run();

        $actor = Actor::all()->random();
        $film = Film::all()->random();
        $genre = Genre::all()->random();
        $user = User::all()->random();

        foreach ($actor->films as $film) {
            $this->assertInstanceOf(Film::class, $film);
        }

        foreach ($film->users as $user) {
            $this->assertInstanceOf(User::class, $user);
        }

        $this->assertNotEmpty($film->genres);
        foreach ($film->genres as $genre) {
            $this->assertInstanceOf(Genre::class, $genre);
        }

        $this->assertNotEmpty($film->actors);
        foreach ($film->actors as $actor) {
            $this->assertInstanceOf(Actor::class, $actor);
        }

        foreach ($film->comments as $comment) {
            $this->assertInstanceOf(Comment::class, $comment);
        }

        foreach ($genre->films as $film) {
            $this->assertInstanceOf(Film::class, $film);
        }

        foreach ($user->comments as $comment) {
            $this->assertInstanceOf(Comment::class, $comment);
        }

        foreach ($user->films as $film) {
            $this->assertInstanceOf(Film::class, $film);
        }
    }
}
