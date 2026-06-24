<?php

namespace Tests\Feature;

use App\Mail\InfoRequestMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class InfoRequestMailTest extends TestCase
{
    public function test_user_can_send_an_info_request_email(): void
    {
        Mail::fake();

        $response = $this->post(route('info.store'), [
            'name' => 'Jason Reader',
            'email' => 'jason@example.com',
            'topic' => 'Press kit',
            'message' => 'Vorrei ricevere maggiori informazioni sul progetto e sulle prossime comunicazioni della community.',
        ]);

        $response
            ->assertRedirect(route('info.create'))
            ->assertSessionHas('status');

        Mail::assertSent(InfoRequestMail::class, function (InfoRequestMail $mail): bool {
            return $mail->infoRequest['email'] === 'jason@example.com'
                && $mail->infoRequest['topic'] === 'Press kit';
        });
    }

    public function test_info_request_form_rejects_invalid_payload(): void
    {
        $this->post(route('info.store'), [
            'name' => '',
            'email' => 'wrong',
            'topic' => 'Telefono',
            'message' => 'Breve.',
        ])->assertSessionHasErrors([
            'name',
            'email',
            'topic',
            'message',
        ]);
    }
}
