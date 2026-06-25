<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHauntedHouseRequest;
use App\Models\HauntedHouse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class HauntedHouseController extends Controller
{
    public function home(): View
    {
        $featuredHouses = HauntedHouse::query()
            ->where('is_recommended', true)
            ->latest()
            ->take(3)
            ->get();

        return view('haunted-houses.home', ['featuredHouses' => $featuredHouses]);
    }

    public function index(): View
    {
        $hauntedHouses = HauntedHouse::query()
            ->latest()
            ->get();

        return view('haunted-houses.index', ['hauntedHouses' => $hauntedHouses]);
    }

    public function create(): View
    {
        return view('haunted-houses.create');
    }

    public function store(StoreHauntedHouseRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        HauntedHouse::query()->create([
            ...$validated,
            'description' => 'Nuova destinazione proposta dalla community: perfetta per chi cerca una notte fuori programma.',
        ]);

        return to_route('haunted-houses.index')
            ->with('status', 'La tua casa infestata e stata aggiunta al portale.');
    }
}
