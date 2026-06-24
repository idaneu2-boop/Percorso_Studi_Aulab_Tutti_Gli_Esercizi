<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
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
            ->assertSee('GTA VI Hub')
            ->assertSee('/gta-6')
            ->assertSee('/categorie/laravel')
            ->assertSee('/index.html');
    }

    public function test_category_route_filters_home_cards(): void
    {
        $this->get('/categorie/laravel')
            ->assertOk()
            ->assertSee('Esercizi Laravel')
            ->assertSee('GTA VI Hub')
            ->assertDontSee('JDM Garage');
    }

    public function test_legacy_html_page_route_still_works(): void
    {
        $this->get('/index.html')
            ->assertOk()
            ->assertSee('test-comandi');
    }

    public function test_legacy_home_html_redirects_to_dashboard(): void
    {
        $this->get('/home.html')
            ->assertRedirect(route('home'));
    }
}
