<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Support\ExerciseCatalog;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('GTA VI')
            ->assertSee('/gta-6')
            ->assertSee('/categorie/laravel')
            ->assertSee('/categorie/php')
            ->assertSee('/categorie/api')
            ->assertSee('/categorie/collab')
            ->assertSee('/categorie/mysql')
            ->assertSee('/index.html')
            ->assertDontSee('Modernizzazione Laravel 13')
            ->assertDontSee('Stack applicato alla dashboard')
            ->assertDontSee('exercise-upgrade-bar', false);
    }

    public function test_home_does_not_cache_the_catalog_while_testing(): void
    {
        Cache::forget(ExerciseCatalog::CacheKey);

        $this->get(route('home'))->assertOk();

        $this->assertFalse(Cache::has(ExerciseCatalog::CacheKey));
    }

    public function test_home_category_dropdown_includes_new_backend_categories(): void
    {
        $response = $this->get('/')->assertOk();

        foreach ([
            'php' => 'PHP',
            'api' => 'API',
            'collab' => 'Collab',
            'mysql' => 'MySQL',
        ] as $slug => $label) {
            $response
                ->assertSee('data-category="'.$slug.'"', false)
                ->assertSee('/categorie/'.$slug)
                ->assertSee($label);
        }
    }

    public function test_category_route_filters_home_cards(): void
    {
        $this->get('/categorie/laravel')
            ->assertOk()
            ->assertSee('Esercizi Laravel')
            ->assertSee('GTA VI')
            ->assertDontSee('JDM Garage');
    }

    public function test_new_backend_category_routes_show_related_cards(): void
    {
        $this->get('/categorie/php')
            ->assertOk()
            ->assertSee('Esercizi PHP')
            ->assertSee('Anime.TV')
            ->assertSee('GTA VI')
            ->assertSee('Dimore Spettrali');

        $this->get('/categorie/api')
            ->assertOk()
            ->assertSee('Esercizi API')
            ->assertSee('Anime.TV')
            ->assertDontSee('GTA VI');

        $this->get('/categorie/collab')
            ->assertOk()
            ->assertSee('Esercizi Collab')
            ->assertSee('GTA VI')
            ->assertDontSee('Anime.TV');

        $this->get('/categorie/mysql')
            ->assertOk()
            ->assertSee('Esercizi MySQL')
            ->assertSee('GTA VI')
            ->assertSee('Dimore Spettrali')
            ->assertDontSee('Anime.TV');
    }

    public function test_legacy_html_page_route_still_works(): void
    {
        $this->get('/index.html')
            ->assertOk()
            ->assertSee('test-comandi')
            ->assertSee('/media/logo-test-comandi.png')
            ->assertDontSee('exercise-upgrade-bar', false)
            ->assertDontSee('API catalogo');
    }

    public function test_exercises_catalog_is_available_as_json_api(): void
    {
        $response = $this->get(route('exercises.api.index'));

        $response
            ->assertOk()
            ->assertJsonPath('data.0.type', 'exercises')
            ->assertJsonPath('data.0.attributes.title', 'Test-Comandi')
            ->assertJsonPath('data.0.attributes.modernized_with.0', 'Cache viva')
            ->assertJsonPath('links.dashboard', '/');

        $this->assertStringContainsString(
            'application/vnd.api+json',
            (string) $response->headers->get('Content-Type'),
        );
    }

    public function test_exercises_json_api_can_filter_by_category(): void
    {
        $this->get(route('exercises.api.index', ['category' => 'api']))
            ->assertOk()
            ->assertJsonPath('data.0.attributes.title', 'Anime.TV')
            ->assertJsonMissingPath('data.1.attributes.title');
    }

    public function test_legacy_home_html_redirects_to_dashboard(): void
    {
        $this->get('/home.html')
            ->assertRedirect(route('home'));
    }

    public function test_pokemitology_pages_have_story_main_sections_and_contact_footer(): void
    {
        $pages = [
            '/pokemitology (1).html' => [
                'heading' => 'Di cosa tratta Pok&eacute;Mitology',
                'timeline' => null,
            ],
            '/pokemitology (2).html' => [
                'heading' => 'La creazione secondo Arceus',
                'timeline' => 'Uovo cosmico e Arceus',
            ],
            '/pokemitology (3).html' => [
                'heading' => 'Il medioevo delle torri e di Ho-Oh',
                'timeline' => 'La Torre d Ottone viene distrutta',
            ],
            '/pokemitology (4).html' => [
                'heading' => 'Dal mito agli Allenatori moderni',
                'timeline' => 'Mewtwo e i laboratori moderni',
            ],
        ];

        foreach ($pages as $page => $content) {
            $response = $this->get($page)
                ->assertOk()
                ->assertSee('<main class="pokemitology-main">', false)
                ->assertSee('data-pokemitology-search', false)
                ->assertSee('data-pokemitology-search-status', false)
                ->assertSee('/js/pokemitology-search.js')
                ->assertSee($content['heading'], false)
                ->assertSee('idaneu2@gmail.com')
                ->assertSee('3281022479')
                ->assertSee('Daniele.Pigliacelli_')
                ->assertSee('Fan page non ufficiale dedicata al mondo Pok&eacute;mon.', false)
                ->assertDontSee('wiki.pokemoncentral.it', false);

            if ($content['timeline'] !== null) {
                $response
                    ->assertSee('class="pokemitology-timeline"', false)
                    ->assertSee($content['timeline'], false);
            }
        }
    }
}
