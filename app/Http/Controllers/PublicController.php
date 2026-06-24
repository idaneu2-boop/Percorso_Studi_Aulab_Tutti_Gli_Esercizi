<?php

namespace App\Http\Controllers;

use App\Support\GtaContent;
use Illuminate\Contracts\View\View;

class PublicController extends Controller
{
    public function home(GtaContent $content): View
    {
        return view('welcome', [
            'atmosphere' => $content->homeAtmosphere(),
            'carouselItems' => $content->homeCarouselItems(),
            'features' => $content->homeFeatures(),
            'intro' => $content->homeIntro(),
            'trailers' => $content->homeTrailerVideos(),
        ]);
    }
}
