<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SuperMarioGameController extends Controller
{
    private const SessionKey = 'super_mario_game';

    public function show(Request $request): View
    {
        return view('supermario', [
            'game' => $this->gameState($request),
        ]);
    }

    public function start(Request $request): RedirectResponse
    {
        $request->session()->put(self::SessionKey, [
            'status' => 'playing',
            'stars' => 0,
            'attempts' => 0,
            'heading' => 'Partenza!',
            'message' => 'Raccogli 5 stelle e supera i nemici.',
        ]);

        return redirect()->route('supermario.show');
    }

    public function choose(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'choice' => ['required', 'string', Rule::in(['run', 'jump', 'star', 'mistake', 'exit'])],
        ]);

        if ($validated['choice'] === 'exit') {
            $request->session()->put(self::SessionKey, [
                ...$this->defaultGame(),
                'status' => 'cancelled',
                'heading' => 'Partita annullata',
                'message' => 'Alla prossima!',
            ]);

            return redirect()->route('supermario.show');
        }

        $game = $this->gameState($request);

        if ($game['status'] !== 'playing') {
            return redirect()->route('supermario.show');
        }

        match ($validated['choice']) {
            'run' => $game = [
                ...$game,
                'heading' => 'Nemico schivato!',
                'message' => "C'e' mancato poco! Sei riuscito a schivare il nemico.",
            ],
            'jump' => $game = [
                ...$game,
                'heading' => 'Colpo perfetto!',
                'message' => "Wow! Bravissimo! L'hai superato. Continua cosi'!",
            ],
            'star' => $game = $this->collectStar($game),
            'mistake' => $game = $this->takeHit($game),
        };

        $request->session()->put(self::SessionKey, $game);

        return redirect()->route('supermario.show');
    }

    public function reset(Request $request): RedirectResponse
    {
        $request->session()->forget(self::SessionKey);

        return redirect()->route('supermario.show');
    }

    /**
     * @return array{status: string, stars: int, attempts: int, heading: string, message: string}
     */
    private function gameState(Request $request): array
    {
        return [
            ...$this->defaultGame(),
            ...$request->session()->get(self::SessionKey, []),
        ];
    }

    /**
     * @return array{status: string, stars: int, attempts: int, heading: string, message: string}
     */
    private function defaultGame(): array
    {
        return [
            'status' => 'ready',
            'stars' => 0,
            'attempts' => 0,
            'heading' => 'Sei pronto a iniziare la partita?',
            'message' => 'Premi Play per iniziare il livello.',
        ];
    }

    /**
     * @param  array{status: string, stars: int, attempts: int, heading: string, message: string}  $game
     * @return array{status: string, stars: int, attempts: int, heading: string, message: string}
     */
    private function collectStar(array $game): array
    {
        $stars = $game['stars'] + 1;

        if ($stars >= 5) {
            return [
                ...$game,
                'status' => 'won',
                'stars' => 5,
                'heading' => 'Hai completato il livello!',
                'message' => 'Complimenti! Hai raccolto tutte le stelle.',
            ];
        }

        return [
            ...$game,
            'stars' => $stars,
            'heading' => 'Stella raccolta!',
            'message' => 'Stelle mancanti: '.(5 - $stars),
        ];
    }

    /**
     * @param  array{status: string, stars: int, attempts: int, heading: string, message: string}  $game
     * @return array{status: string, stars: int, attempts: int, heading: string, message: string}
     */
    private function takeHit(array $game): array
    {
        $attempts = $game['attempts'] + 1;

        if ($attempts >= 5) {
            return [
                ...$game,
                'status' => 'lost',
                'attempts' => 5,
                'heading' => 'Game Over',
                'message' => 'Peccato, il nemico ti ha fermato.',
            ];
        }

        return [
            ...$game,
            'attempts' => $attempts,
            'heading' => 'Colpito!',
            'message' => 'Tentativi rimasti: '.(5 - $attempts),
        ];
    }
}
