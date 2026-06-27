<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExerciseResource;
use App\Support\ExerciseCatalog;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Attributes\Controllers\Middleware;

#[Middleware('cache.headers:public;max_age=300;etag')]
class ExerciseApiController extends Controller
{
    public function index(Request $request, ExerciseCatalog $catalog): JsonResource
    {
        $category = $request->query('category');

        if ($category !== null && ! is_string($category)) {
            abort(404);
        }

        $selectedCategory = $category ? $catalog->findCategory($category) : null;

        if ($category && ! $selectedCategory) {
            abort(404);
        }

        return ExerciseResource::collection($catalog->exercises($selectedCategory['slug'] ?? null))
            ->additional([
                'links' => [
                    'self' => route('exercises.api.index', $selectedCategory ? ['category' => $selectedCategory['slug']] : [], false),
                    'dashboard' => route('home', [], false),
                ],
                'meta' => [
                    ...$catalog->catalogMeta(),
                    'selected_category' => $selectedCategory,
                ],
            ]);
    }
}
