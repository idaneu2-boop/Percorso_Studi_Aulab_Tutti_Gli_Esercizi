<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ExerciseDashboardController;
use App\Http\Controllers\InfoRequestController;
use App\Http\Controllers\LegacyPageController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ExerciseDashboardController::class, 'index'])->name('home');

Route::get('/home', [ExerciseDashboardController::class, 'index']);
Route::get('/categorie/{category}', [ExerciseDashboardController::class, 'category'])
    ->name('home.category');

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
