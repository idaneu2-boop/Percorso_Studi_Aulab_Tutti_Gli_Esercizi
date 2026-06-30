<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class AuthenticationExerciseTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_dashboard_includes_the_authentication_card(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Autenticazione NASA')
            ->assertSee('/autenticazione', false)
            ->assertSee('/media/autenticazione/logo.png', false)
            ->assertDontSee('Bentornato a bordo.')
            ->assertDontSee('Prepara il tuo lancio.');
    }

    public function test_global_auth_urls_do_not_show_the_nasa_authentication_forms(): void
    {
        $this->get('/login')->assertNotFound();
        $this->get('/register')->assertNotFound();
    }

    public function test_guests_are_redirected_from_authentication_exercise(): void
    {
        $this->get(route('autenticazione.home'))
            ->assertRedirect(route('login', absolute: false));
    }

    public function test_guests_can_view_the_authentication_forms(): void
    {
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('Bentornato a bordo.')
            ->assertSee(route('login.store', absolute: false), false);

        $this->get(route('register'))
            ->assertOk()
            ->assertSee('Prepara il tuo lancio.')
            ->assertSee(route('register.store', absolute: false), false);
    }

    public function test_authenticated_users_can_view_the_authentication_home(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('autenticazione.home'))
            ->assertOk()
            ->assertSee('NASA: esplorare')
            ->assertSee(route('autenticazione.posts.index', absolute: false), false);
    }

    public function test_authenticated_users_can_view_json_posts(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('autenticazione.posts.index'))
            ->assertOk()
            ->assertSee('Ames Science Stars of the Month July 2026')
            ->assertSee('/media/autenticazione/moon-earthrise.jpg', false)
            ->assertSee('NASA.gov')
            ->assertSee('Scrivi un aggiornamento');
    }

    public function test_post_create_page_displays_its_header_background(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('autenticazione.posts.create'))
            ->assertOk()
            ->assertSee('Crea un post missione.')
            ->assertSee('/media/autenticazione/mars-jezero.jpg', false)
            ->assertSee('action="'.route('autenticazione.posts.store', absolute: false).'"', false);
    }

    public function test_authenticated_users_can_create_update_and_delete_their_posts(): void
    {
        $user = User::factory()->create();

        $createResponse = $this->actingAs($user)
            ->post(route('autenticazione.posts.store'), [
                'title' => 'Nuovo report da Mission Control',
                'excerpt' => 'Un aggiornamento sintetico sulle attivita NASA inserito da un utente autenticato.',
                'body' => 'Il contenuto del post descrive una nuova attivita missione con dettagli sufficienti per superare la validazione.',
                'source_url' => 'https://www.nasa.gov/',
                'published_at' => now()->toDateString(),
            ]);

        $post = Post::query()->where('title', 'Nuovo report da Mission Control')->firstOrFail();

        $createResponse->assertRedirect(route('autenticazione.posts.show', $post));
        $this->assertModelExists($post);

        $this->actingAs($user)
            ->put(route('autenticazione.posts.update', $post), [
                'title' => 'Report aggiornato da Mission Control',
                'excerpt' => 'Questo riassunto aggiornato supera la validazione richiesta dal form.',
                'body' => 'Il contenuto aggiornato del post viene salvato nel database con tutte le nuove modifiche.',
                'source_url' => 'https://www.nasa.gov/',
                'published_at' => now()->toDateString(),
            ])
            ->assertRedirect(route('autenticazione.posts.show', $post));

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Report aggiornato da Mission Control',
        ]);

        $this->actingAs($user)
            ->delete(route('autenticazione.posts.destroy', $post))
            ->assertRedirect(route('autenticazione.posts.index'));

        $this->assertModelMissing($post);
    }

    public function test_users_cannot_update_other_users_posts(): void
    {
        $owner = User::factory()->create();
        $otherUser = User::factory()->create();
        $post = Post::factory()->for($owner)->create([
            'title' => 'Titolo protetto',
        ]);

        $this->actingAs($otherUser)
            ->put(route('autenticazione.posts.update', $post), [
                'title' => 'Tentativo non autorizzato',
                'excerpt' => 'Questo riassunto sarebbe valido ma non deve essere autorizzato.',
                'body' => 'Questo contenuto sarebbe valido ma non deve aggiornare il post di un altro utente.',
                'source_url' => 'https://www.nasa.gov/',
                'published_at' => now()->toDateString(),
            ])
            ->assertForbidden();

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Titolo protetto',
        ]);
    }

    public function test_post_creation_requires_valid_data(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('autenticazione.posts.store'), [
                'title' => 'No',
                'excerpt' => 'Breve',
                'body' => 'Troppo corto',
                'source_url' => 'non-un-url',
                'published_at' => now()->addDay()->toDateString(),
            ])
            ->assertSessionHasErrors(['title', 'excerpt', 'body', 'source_url', 'published_at']);
    }
}
