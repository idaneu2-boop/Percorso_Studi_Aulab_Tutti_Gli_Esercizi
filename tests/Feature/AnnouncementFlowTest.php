<?php

namespace Tests\Feature;

use App\Models\Announcement;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AnnouncementFlowTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_user_can_publish_an_announcement_and_open_its_detail_page(): void
    {
        $response = $this->post(route('announcements.store'), [
            'reporter_name' => 'Lucia Fan',
            'reporter_email' => 'lucia@example.com',
            'title' => 'Nuovo avvistamento a Vice Beach',
            'category' => 'Mappa',
            'location' => 'Vice Beach',
            'credibility' => 4,
            'is_spoiler' => '1',
            'body' => 'Una segnalazione dettagliata parla di nuove zone visitabili lungo la costa di Vice Beach e di eventi dinamici vicino al molo.',
        ]);

        $announcement = Announcement::query()->firstOrFail();

        $response->assertRedirect(route('announcements.show', $announcement));
        $this->assertModelExists($announcement);

        $this->get(route('announcements.show', $announcement))
            ->assertOk()
            ->assertSee('Nuovo avvistamento a Vice Beach')
            ->assertSee('Vice Beach')
            ->assertSee('Spoiler');
    }

    public function test_index_lists_database_announcements_before_json_announcements(): void
    {
        Announcement::factory()->create([
            'title' => 'Leak caricato da utente sopra il JSON',
            'created_at' => now()->subYear(),
        ]);

        $this->get(route('announcements.index'))
            ->assertOk()
            ->assertSeeInOrder([
                'Leak caricato da utente sopra il JSON',
                'Pre-order GTA VI annunciato per il 25 giugno',
            ]);
    }

    public function test_static_json_announcement_has_detail_page(): void
    {
        $this->get(route('announcements.static.show', 'preorder-gta-vi-25-giugno-2026'))
            ->assertOk()
            ->assertSee('Pre-order GTA VI annunciato per il 25 giugno')
            ->assertSee('Ufficiale Rockstar')
            ->assertSee('Apri fonte');
    }

    public function test_user_can_publish_an_announcement_with_optional_image(): void
    {
        Storage::fake('public');

        $this->post(route('announcements.store'), [
            'reporter_name' => 'Jason Fan',
            'reporter_email' => 'jason@example.com',
            'title' => 'Screenshot da Port Gellhorn',
            'category' => 'Mappa',
            'location' => 'Port Gellhorn',
            'credibility' => 4,
            'body' => 'Una segnalazione molto dettagliata parla di nuove strade costiere, moli e strutture industriali visibili nella zona di Port Gellhorn.',
            'image' => $this->uploadedPng(),
        ])->assertRedirect();

        $announcement = Announcement::query()->where('title', 'Screenshot da Port Gellhorn')->firstOrFail();

        $this->assertNotNull($announcement->image_path);
        Storage::disk('public')->assertExists($announcement->image_path);
    }

    public function test_json_announcement_cards_do_not_render_images(): void
    {
        $this->get(route('announcements.index'))
            ->assertOk()
            ->assertDontSee('Scenario Online GTA VI')
            ->assertSee('Pre-order GTA VI annunciato per il 25 giugno');
    }

    public function test_announcement_form_rejects_invalid_payload(): void
    {
        $this->post(route('announcements.store'), [
            'reporter_name' => 'A',
            'reporter_email' => 'not-an-email',
            'title' => 'Short',
            'category' => 'Rumor libero',
            'credibility' => 9,
            'body' => 'Troppo breve.',
        ])->assertSessionHasErrors([
            'reporter_name',
            'reporter_email',
            'title',
            'category',
            'credibility',
            'body',
        ]);
    }

    private function uploadedPng(): UploadedFile
    {
        $path = tempnam(sys_get_temp_dir(), 'announcement-image-');

        file_put_contents($path, base64_decode(
            'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+/p9sAAAAASUVORK5CYII='
        ));

        $this->beforeApplicationDestroyed(fn (): bool => @unlink($path));

        return new UploadedFile($path, 'port-gellhorn.png', 'image/png', null, true);
    }
}
