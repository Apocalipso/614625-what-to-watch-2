<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FilmTest extends TestCase
{
    use RefreshDatabase;

    public function test_movie_rating(): void
    {
        $film = Film::factory()->create();

        $referenceCountComment = 12;

        $benchmarkRating1 = 3;
        $benchmarkRating2 = 7;
        $benchmarkRating3 = 9;

        $sumbenchmarkRatings = ($benchmarkRating1 + $benchmarkRating2 + $benchmarkRating3) * $referenceCountComment / 3;
        $referenceRating = round($sumbenchmarkRatings / $referenceCountComment, 1);

        Comment::factory()
            ->count($referenceCountComment)
            ->state(new Sequence(
                ['film_id' => $film, 'rating' => $benchmarkRating1],
                ['film_id' => $film, 'rating' => $benchmarkRating2],
                ['film_id' => $film, 'rating' => $benchmarkRating3],
            ))
            ->create();

        $comments = $film->comments;

        $rating = round($comments->avg('rating'), 1);

        $this->assertEquals($referenceRating, $rating);
    }

    public function test_movie_rating_with_no_comments(): void
    {
        $film = Film::factory()->create();

        $comments = $film->comments;

        $rating = round($comments->avg('rating'), 1);

        $this->assertEquals(0, $rating);
    }
}
