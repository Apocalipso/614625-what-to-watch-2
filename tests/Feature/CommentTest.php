<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Film;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    public function test_to_get_comment_author_name(): void
    {
        $film = Film::factory()->create();
        $user = User::factory()->create();

        $comment = Comment::factory()
            ->state(new Sequence(
                fn ($sequence) => ['film_id' => $film, 'user_id' => $user],
            ))
            ->create();

        $autor = $comment->user;

        $this->assertEquals($user->name, $autor->name);
    }

    public function test_with_anonymous_comment(): void
    {
        $film = Film::factory()->create();

        $comment = Comment::factory()
            ->state(new Sequence(
                fn ($sequence) => ['film_id' => $film, 'user_id' => null],
            ))
            ->create();

        $autor = $comment->user;

        $this->assertEquals('Автор неизвестен', $autor->name);
    }
}
