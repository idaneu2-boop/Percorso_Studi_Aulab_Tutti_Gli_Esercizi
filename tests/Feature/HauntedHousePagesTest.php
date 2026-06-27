<?php

namespace Tests\Feature;

use App\Models\HauntedHouse;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class HauntedHousePagesTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_dashboard_includes_the_haunted_houses_card(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Dimore Spettrali')
            ->assertSee('/case-infestate', false);
    }

    public function test_homepage_shows_three_recommended_haunted_houses(): void
    {
        $recommendedHouses = HauntedHouse::factory()
            ->count(3)
            ->recommended()
            ->create();

        HauntedHouse::factory()->create(['name' => 'Casa non consigliata']);

        $response = $this->get(route('haunted-houses.home'));

        $response->assertOk();
        $response->assertSee('Viaggi oltre la soglia');
        $recommendedHouses->each(fn (HauntedHouse $hauntedHouse) => $response->assertSee($hauntedHouse->name));
        $response->assertDontSee('Casa non consigliata');
    }

    public function test_index_page_displays_all_haunted_houses(): void
    {
        $hauntedHouses = HauntedHouse::factory()
            ->count(2)
            ->create();

        $response = $this->get(route('haunted-houses.index'));

        $response->assertOk();
        $hauntedHouses->each(fn (HauntedHouse $hauntedHouse) => $response->assertSee($hauntedHouse->name));
    }

    public function test_create_page_displays_the_submission_form(): void
    {
        $this->get(route('haunted-houses.create'))
            ->assertOk()
            ->assertSee('Aggiungi la tua casa infestata')
            ->assertSee('Nome casa infestata');
    }

    public function test_haunted_house_pages_use_their_own_favicon(): void
    {
        $this->get(route('haunted-houses.home'))
            ->assertOk()
            ->assertSee('rel="icon"', false)
            ->assertSee('haunted-house-favicon.svg', false);
    }

    public function test_haunted_house_pages_link_back_to_the_exercises_dashboard(): void
    {
        $routes = [
            'haunted-houses.home',
            'haunted-houses.index',
            'haunted-houses.create',
        ];

        foreach ($routes as $route) {
            $this->get(route($route))
                ->assertOk()
                ->assertSee('bi-house-door-fill', false)
                ->assertSee('Torna alla pagina degli esercizi')
                ->assertSee('href="'.route('home').'"', false);
        }
    }

    public function test_store_creates_a_new_haunted_house(): void
    {
        $response = $this->post(route('haunted-houses.store'), [
            'name' => 'Villa Nebbia',
            'location' => 'Bologna, Italia',
            'price_per_night' => '180.50',
        ]);

        $response->assertRedirect(route('haunted-houses.index'));
        $this->assertDatabaseHas('haunted_houses', [
            'name' => 'Villa Nebbia',
            'location' => 'Bologna, Italia',
        ]);
    }

    public function test_store_accepts_comma_decimal_prices(): void
    {
        $this->post(route('haunted-houses.store'), [
            'name' => 'Castello Bruma',
            'location' => 'Trieste, Italia',
            'price_per_night' => '210,75',
        ])->assertRedirect(route('haunted-houses.index'));

        $this->assertDatabaseHas('haunted_houses', [
            'name' => 'Castello Bruma',
            'price_per_night' => '210.75',
        ]);
    }

    public function test_store_requires_valid_data(): void
    {
        $response = $this->post(route('haunted-houses.store'), [
            'name' => '',
            'location' => '',
            'price_per_night' => 'free',
        ]);

        $response->assertSessionHasErrors(['name', 'location', 'price_per_night']);
    }
}
