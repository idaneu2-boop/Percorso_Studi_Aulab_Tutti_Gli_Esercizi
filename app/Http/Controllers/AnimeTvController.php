<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnimeRequest;
use App\Models\Anime;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\Factory as HttpFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Throwable;

class AnimeTvController extends Controller
{
    public function home(HttpFactory $http): View
    {
        return view('anime-tv.home', [
            'animes' => $this->fetchAnimeList($http),
        ]);
    }

    public function show(HttpFactory $http, int $animeId): View
    {
        $anime = $this->fetchAnimeDetail($http, $animeId);

        abort_unless($anime, 404);

        return view('anime-tv.show', ['anime' => $anime]);
    }

    public function create(): View
    {
        return view('anime-tv.create');
    }

    public function store(StoreAnimeRequest $request): RedirectResponse
    {
        Anime::query()->create($request->validated());

        return to_route('anime-tv.index')
            ->with('status', 'Anime inserito correttamente!');
    }

    public function index(): View
    {
        $animes = Anime::query()
            ->latest()
            ->get();

        return view('anime-tv.index', ['animes' => $animes]);
    }

    public function api(HttpFactory $http): JsonResponse
    {
        return response()->json([
            'data' => $this->fetchAnimeList($http),
        ]);
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function fetchAnimeList(HttpFactory $http): array
    {
        try {
            $response = $http->retry([100, 300])
                ->timeout(6)
                ->connectTimeout(3)
                ->acceptJson()
                ->get('https://api.jikan.moe/v4/anime');

            if ($response->successful()) {
                $animes = $response->json('data', []);

                if (is_array($animes) && $animes !== []) {
                    return array_values($animes);
                }
            }
        } catch (Throwable) {
        }

        return $this->fallbackAnimes();
    }

    /**
     * @return array<string, mixed>|null
     */
    private function fetchAnimeDetail(HttpFactory $http, int $animeId): ?array
    {
        try {
            $response = $http->retry([100, 300])
                ->timeout(6)
                ->connectTimeout(3)
                ->acceptJson()
                ->get("https://api.jikan.moe/v4/anime/{$animeId}");

            if ($response->successful()) {
                $anime = $response->json('data');

                if (is_array($anime)) {
                    return $anime;
                }
            }
        } catch (Throwable) {
        }

        return Arr::first(
            $this->fallbackAnimes(),
            fn (array $anime): bool => (int) $anime['mal_id'] === $animeId,
        );
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function fallbackAnimes(): array
    {
        return [
            [
                'mal_id' => 1,
                'title' => 'Anime.TV Preview',
                'slug' => Str::slug('Anime.TV Preview'),
                'synopsis' => 'Una scheda dimostrativa mostrata quando l API esterna non risponde. Serve a mantenere navigabile l esercizio anche offline.',
                'episodes' => 12,
                'images' => [
                    'jpg' => [
                        'image_url' => asset('media/anime-tv/gojo.jpg'),
                        'large_image_url' => asset('media/anime-tv/gojo.jpg'),
                    ],
                ],
                'genres' => [
                    ['name' => 'Action'],
                    ['name' => 'Fantasy'],
                ],
                'trailer' => [
                    'embed_url' => null,
                ],
            ],
        ];
    }
}
