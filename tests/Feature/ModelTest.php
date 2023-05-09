<?php

namespace Tests\Feature;

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Models\Actor;
use \App\Models\Comment;
use \App\Models\Favorite;
use \App\Models\Film;
use \App\Models\Genre;
use \App\Models\User;

class ModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Тест модели класса Actor.
     *
     * @return void
     */
    public function test_actor(): void
    {
        $actor = Actor::factory()->create();

        $this->assertInstanceOf(Actor::class, $actor);
    }

    /**
     * Тест модели класса Film.
     *
     * @return void
     */
    public function test_film(): void
    {
        $film = Film::factory()->create();

        $this->assertInstanceOf(Film::class, $film);
    }

    /**
     * Тест модели класса Genre.
     *
     * @return void
     */
    public function test_genre(): void
    {
        $genre = Genre::factory()->create();

        $this->assertInstanceOf(Genre::class, $genre);
    }

    /**
     * Тест модели класса User.
     *
     * @return void
     */
    public function test_user(): void
    {
        $user = User::factory()->create();

        $this->assertInstanceOf(User::class, $user);
    }

    /**
     * Тест модели класса Comment.
     *
     * @return void
     */
    public function test_comment(): void
    {
        $film = Film::factory()->create();
        $user = User::factory()->create();

        $comment = Comment::factory()->create(['film_id' => $film->id, 'user_id' => $user->id]);

        $this->assertInstanceOf(Comment::class, $comment);

        $this->assertNotEmpty($comment->user_id);
        $this->assertInstanceOf(User::class, $comment->user);

        $this->assertNotEmpty($comment->film_id);
        $this->assertInstanceOf(Film::class, $comment->film);

        $this->assertEquals($user->id, $comment->user_id);
        $this->assertEquals($film->id, $comment->film_id);
    }

    /**
     * Тест модели класса Comment.
     *
     * @return void
     */
    public function test_favorite(): void
    {
        $film = Film::factory()->create();
        $user = User::factory()->create();

        $favorite = Favorite::factory()->create(['film_id' => $film->id, 'user_id' => $user->id]);

        $this->assertInstanceOf(Favorite::class, $favorite);

        $this->assertNotEmpty($favorite->user_id);
        $this->assertInstanceOf(User::class, $favorite->user);

        $this->assertEquals($user->id, $favorite->user_id);
        $this->assertEquals($film->id, $favorite->film_id);
    }
}
