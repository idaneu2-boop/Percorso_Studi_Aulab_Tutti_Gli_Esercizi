<?php

namespace Tests\Feature;

use Tests\TestCase;

class SuperMarioGameTest extends TestCase
{
    public function test_super_mario_game_starts_and_can_be_won(): void
    {
        $this->get(route('supermario.show'))
            ->assertOk()
            ->assertSee('Premi Play')
            ->assertSee('marioMusic')
            ->assertSee('Musica')
            ->assertDontSee('Laravel Mode')
            ->assertDontSee('supermario.js');

        $this->post(route('supermario.start'))
            ->assertRedirect(route('supermario.show'));

        foreach (range(1, 5) as $turn) {
            $this->post(route('supermario.choose'), ['choice' => 'star'])
                ->assertRedirect(route('supermario.show'));
        }

        $this->get(route('supermario.show'))
            ->assertOk()
            ->assertSee('Level Clear!')
            ->assertSee('Stelle 5/5');
    }

    public function test_super_mario_game_can_be_lost(): void
    {
        $this->post(route('supermario.start'))
            ->assertRedirect(route('supermario.show'));

        foreach (range(1, 5) as $turn) {
            $this->post(route('supermario.choose'), ['choice' => 'mistake'])
                ->assertRedirect(route('supermario.show'));
        }

        $this->get(route('supermario.show'))
            ->assertOk()
            ->assertSee('Game Over')
            ->assertSee('Errori 5/5');
    }
}
