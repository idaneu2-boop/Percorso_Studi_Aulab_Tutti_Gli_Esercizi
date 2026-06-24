<?php

namespace App\Http\Controllers;

use App\Support\ExerciseCatalog;
use Illuminate\Contracts\View\View;

class ExerciseDashboardController extends Controller
{
    public function index(ExerciseCatalog $catalog): View
    {
        return $this->renderHome($catalog);
    }

    public function category(string $category, ExerciseCatalog $catalog): View
    {
        $selectedCategory = $catalog->findCategory($category);

        abort_unless($selectedCategory, 404);

        return $this->renderHome($catalog, $selectedCategory);
    }

    /**
     * @param  array{label: string, slug: string}|null  $selectedCategory
     */
    private function renderHome(ExerciseCatalog $catalog, ?array $selectedCategory = null): View
    {
        return view('home', [
            'categories' => $catalog->categories(),
            'contacts' => $catalog->footerContacts(),
            'exercises' => $catalog->exercises($selectedCategory['slug'] ?? null),
            'hero' => $catalog->hero(),
            'pageHeading' => $selectedCategory
                ? 'Esercizi '.$selectedCategory['label']
                : 'Tutti gli esercizi ordinati per data',
            'profile' => $catalog->profile(),
            'selectedCategory' => $selectedCategory,
            'title' => $selectedCategory
                ? 'Esercizi '.$selectedCategory['label'].' | Daniele'
                : 'Esercizi Daniele | aulab',
        ]);
    }
}
