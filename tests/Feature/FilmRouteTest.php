<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use \App\Models\User;

class FilmRouteTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_films()
    {
        $response = $this->getJson('/api/films');

        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => []
            ]);

        $user = Sanctum::actingAs(User::factory()->create());

        $response = $this->actingAs($user)->getJson('/api/films');

        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => []
            ]);

        $user = Sanctum::actingAs(User::factory()->moderator()->create());

        $response = $this->actingAs($user)->getJson('/api/films');

        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => []
            ]);
    }

    public function test_get_film()
    {
        $filmsId = 1;

        $response = $this->getJson("/api/films/{$filmsId}");

        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => []
            ]);

        $user = Sanctum::actingAs(User::factory()->create());

        $response = $this->actingAs($user)->getJson("/api/films/{$filmsId}");

        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => []
            ]);

        $user = Sanctum::actingAs(User::factory()->moderator()->create());

        $response = $this->actingAs($user)->getJson("/api/films/{$filmsId}");

        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => []
            ]);
    }

    public function test_post_film()
    {
        $filmId = 1;
        $response = $this->postJson("/api/films/{$filmId}");

        $response->assertUnauthorized();

        $user = Sanctum::actingAs(User::factory()->create());

        $response = $this->actingAs($user)->postJson("/api/films/{$filmId}");

        $response->assertForbidden();

        $user = Sanctum::actingAs(User::factory()->moderator()->create());

        $response = $this->actingAs($user)->postJson("/api/films/{$filmId}");

        $response->assertCreated();
    }


    public function test_update_film()
    {
        $filmId = 1;

        $response = $this->patchJson("/api/films/{$filmId}");

        $response->assertUnauthorized();

        $user = Sanctum::actingAs(User::factory()->create());

        $response = $this->actingAs($user)->patchJson("/api/films/{$filmId}");

        $response->assertForbidden();

        $user = Sanctum::actingAs(User::factory()->moderator()->create());

        $response = $this->actingAs($user)->patchJson("/api/films/{$filmId}");

        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => []
            ]);
    }
}
