<?php

namespace Tests\Feature;

use App\Models\Anime;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class AnimeTvPagesTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_dashboard_includes_the_anime_tv_card(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Anime.TV API')
            ->assertSee('/anime-tv', false);
    }

    public function test_homepage_displays_animes_from_jikan_api(): void
    {
        Http::preventStrayRequests();
        Http::fake([
            'https://api.jikan.moe/v4/anime' => Http::response([
                'data' => [$this->apiAnime()],
            ]),
        ]);

        $this->get(route('anime-tv.home'))
            ->assertOk()
            ->assertSee('Anime.TV')
            ->assertSee('Cowboy Bebop')
            ->assertSee('Vai al dettaglio')
            ->assertDontSee('Jikan API + Laravel')
            ->assertDontSee('bi bi-stars', false);
    }

    public function test_detail_page_displays_api_anime_details(): void
    {
        Http::preventStrayRequests();
        Http::fake([
            'https://api.jikan.moe/v4/anime/1' => Http::response([
                'data' => $this->apiAnime(),
            ]),
        ]);

        $this->get(route('anime-tv.show', ['animeId' => 1, 'slug' => 'cowboy-bebop']))
            ->assertOk()
            ->assertSee('Cowboy Bebop')
            ->assertSee('Action')
            ->assertSee('Numero di episodi');
    }

    public function test_json_api_endpoint_returns_anime_data(): void
    {
        Http::preventStrayRequests();
        Http::fake([
            'https://api.jikan.moe/v4/anime' => Http::response([
                'data' => [$this->apiAnime()],
            ]),
        ]);

        $this->get(route('anime-tv.api'))
            ->assertOk()
            ->assertJsonPath('data.0.title', 'Cowboy Bebop');
    }

    public function test_anime_tv_pages_use_gojo_as_favicon(): void
    {
        Http::preventStrayRequests();
        Http::fake([
            'https://api.jikan.moe/v4/anime' => Http::response([
                'data' => [$this->apiAnime()],
            ]),
        ]);

        $this->get(route('anime-tv.home'))
            ->assertOk()
            ->assertSee('rel="icon"', false)
            ->assertSee('media/anime-tv/gojo.jpg', false);
    }

    public function test_anime_tv_navbar_links_back_to_the_exercises_dashboard(): void
    {
        Http::preventStrayRequests();
        Http::fake([
            'https://api.jikan.moe/v4/anime' => Http::response([
                'data' => [$this->apiAnime()],
            ]),
        ]);

        $this->get(route('anime-tv.home'))
            ->assertOk()
            ->assertSee('bi-house-door-fill', false)
            ->assertSee('Torna alla pagina degli esercizi')
            ->assertSee('href="'.route('home').'"', false)
            ->assertDontSee('JSON API');
    }

    public function test_user_can_store_an_anime(): void
    {
        $response = $this->post(route('anime-tv.store'), [
            'title' => 'Fullmetal Alchemist',
            'genre' => 'Adventure',
            'synopsis' => 'Due fratelli cercano una soluzione dopo un esperimento alchemico finito male.',
        ]);

        $response->assertRedirect(route('anime-tv.index'));
        $this->assertDatabaseHas('animes', [
            'title' => 'Fullmetal Alchemist',
            'genre' => 'Adventure',
        ]);
    }

    public function test_inserted_anime_index_lists_database_records(): void
    {
        Anime::factory()->create([
            'title' => 'Mob Psycho 100',
        ]);

        $this->get(route('anime-tv.index'))
            ->assertOk()
            ->assertSee('Mob Psycho 100');
    }

    public function test_store_requires_valid_data(): void
    {
        $this->post(route('anime-tv.store'), [
            'title' => '',
            'genre' => '',
            'synopsis' => 'short',
        ])->assertSessionHasErrors(['title', 'genre', 'synopsis']);
    }

    /**
     * @return array<string, mixed>
     */
    private function apiAnime(): array
    {
        return [
            'mal_id' => 1,
            'title' => 'Cowboy Bebop',
            'synopsis' => 'A ragtag crew travels through space looking for bounties and trouble.',
            'episodes' => 26,
            'images' => [
                'jpg' => [
                    'image_url' => 'https://example.com/cowboy-bebop.jpg',
                    'large_image_url' => 'https://example.com/cowboy-bebop-large.jpg',
                ],
            ],
            'genres' => [
                ['name' => 'Action'],
                ['name' => 'Sci-Fi'],
            ],
            'trailer' => [
                'embed_url' => 'https://www.youtube.com/embed/test',
            ],
        ];
    }
}
