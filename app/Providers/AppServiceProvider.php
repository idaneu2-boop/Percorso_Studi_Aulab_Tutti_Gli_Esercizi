<?php

namespace App\Providers;

use App\Jobs\WarmExerciseCatalog;
use App\Support\GtaContent;
use Illuminate\Http\Resources\JsonApi\JsonApiResource;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        JsonApiResource::configure(version: '1.1');

        Queue::route(WarmExerciseCatalog::class, queue: 'catalog');

        View::composer(['components.navbar', 'components.footer'], function (\Illuminate\View\View $view): void {
            $content = app(GtaContent::class);

            $view->with([
                'footerCarouselItems' => $content->footerCarouselItems(),
                'footerLinks' => $content->footerLinks(),
                'navigationLinks' => $content->navigationLinks(),
            ]);
        });
    }
}
