<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use \App\Models\User;

class GenreRouteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Проверка метода get роута '/api/genres'
     *
     * @return void
     */
    public function test_get_genres()
    {
        $response = $this->getJson('/api/genres');

        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => []
            ]);

        $user = Sanctum::actingAs(User::factory()->create());

        $response = $this->actingAs($user)->getJson('/api/genres');

        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => []
            ]);

        $user = Sanctum::actingAs(User::factory()->moderator()->create());

        $response = $this->actingAs($user)->getJson('/api/genres');

        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => []
            ]);
    }

    /**
     * Проверка метода patch роута '/api/genres/{genres}'
     *
     * @return void
     */
    public function test_update_genres()
    {
        $genresId = 1;

        $response = $this->patchJson("/api/genres/{$genresId}");

        $response->assertUnauthorized();

        $user = Sanctum::actingAs(User::factory()->create());

        $response = $this->actingAs($user)->patchJson("/api/genres/{$genresId}");

        $response->assertForbidden();

        $user = Sanctum::actingAs(User::factory()->moderator()->create());

        $response = $this->actingAs($user)->patchJson("/api/genres/{$genresId}");

        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => []
            ]);
    }
}
