<?php

use App\Http\Controllers\AnimeTvController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ExerciseDashboardController;
use App\Http\Controllers\HauntedHouseController;
use App\Http\Controllers\InfoRequestController;
use App\Http\Controllers\LegacyPageController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SuperMarioGameController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ExerciseDashboardController::class, 'index'])->name('home');

Route::get('/home', [ExerciseDashboardController::class, 'index']);
Route::get('/categorie/{category}', [ExerciseDashboardController::class, 'category'])
    ->name('home.category');

Route::get('/supermario.html', [SuperMarioGameController::class, 'show'])
    ->name('supermario.show');
Route::post('/supermario/start', [SuperMarioGameController::class, 'start'])
    ->name('supermario.start');
Route::post('/supermario/choose', [SuperMarioGameController::class, 'choose'])
    ->name('supermario.choose');
Route::post('/supermario/reset', [SuperMarioGameController::class, 'reset'])
    ->name('supermario.reset');

Route::prefix('anime-tv')
    ->name('anime-tv.')
    ->controller(AnimeTvController::class)
    ->group(function (): void {
        Route::get('/', 'home')->name('home');
        Route::get('/anime/{animeId}/{slug?}', 'show')
            ->whereNumber('animeId')
            ->name('show');
        Route::get('/inserisci', 'create')->name('create');
        Route::post('/inserisci', 'store')->name('store');
        Route::get('/inseriti', 'index')->name('index');
        Route::get('/api/anime', 'api')->name('api');
    });

Route::prefix('case-infestate')
    ->name('haunted-houses.')
    ->controller(HauntedHouseController::class)
    ->group(function (): void {
        Route::get('/', 'home')->name('home');
        Route::get('/catalogo', 'index')->name('index');
        Route::get('/aggiungi', 'create')->name('create');
        Route::post('/catalogo', 'store')->name('store');
    });

Route::prefix('gta-6')->group(function (): void {
    Route::get('/', [PublicController::class, 'home'])->name('gta.home');

    Route::get('/annunci/json/{announcement}', [AnnouncementController::class, 'showStatic'])
        ->name('announcements.static.show');

    Route::resource('annunci', AnnouncementController::class)
        ->only(['index', 'create', 'store', 'show'])
        ->parameters(['annunci' => 'announcement'])
        ->names('announcements');

    Route::get('/richiedi-info', [InfoRequestController::class, 'create'])->name('info.create');
    Route::post('/richiedi-info', [InfoRequestController::class, 'store'])->name('info.store');
});

Route::get('/{page}.html', [LegacyPageController::class, 'show'])
    ->where('page', '.*')
    ->name('pages.show');
