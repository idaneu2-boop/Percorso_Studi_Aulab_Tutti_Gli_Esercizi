<?php

namespace App\Http\Controllers;

use App\Support\ExerciseCatalog;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LegacyPageController extends Controller
{
    public function show(string $page, ExerciseCatalog $catalog): View|RedirectResponse
    {
        if ($page === 'home') {
            return redirect()->route('home');
        }

        abort_unless(in_array($page, $catalog->legacyPages(), true), 404);

        return view($page);
    }
}
