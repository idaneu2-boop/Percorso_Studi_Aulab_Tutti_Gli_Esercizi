<?php

namespace App\Providers;

use App\Support\GtaContent;
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
