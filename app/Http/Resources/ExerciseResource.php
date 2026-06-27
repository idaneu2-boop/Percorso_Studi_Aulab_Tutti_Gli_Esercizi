<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\JsonApi\JsonApiResource;

class ExerciseResource extends JsonApiResource
{
    /**
     * Get the resource's ID.
     */
    public function toId(Request $request): string
    {
        return (string) $this->resource['id'];
    }

    /**
     * Get the resource's type.
     */
    public function toType(Request $request): string
    {
        return 'exercises';
    }

    /**
     * Get the resource's attributes.
     *
     * @return array<string, mixed>
     */
    public function toAttributes(Request $request): array
    {
        return [
            'title' => $this->resource['title'],
            'tag' => $this->resource['tag'],
            'date' => $this->resource['date'],
            'cta' => $this->resource['cta'],
            'category' => $this->resource['category_slug'],
            'categories' => $this->resource['category_slugs'],
            'search_title' => $this->resource['search_title'],
            'is_legacy' => $this->resource['is_legacy'],
            'modernized_with' => $this->resource['upgrade_badges'],
            'media' => $this->resource['media'],
        ];
    }

    /**
     * Get the resource's links.
     *
     * @return array<string, string>
     */
    public function toLinks(Request $request): array
    {
        return [
            'self' => $this->exerciseHref(),
            'dashboard' => route('home', [], false),
        ];
    }

    /**
     * Get the resource's meta information.
     *
     * @return array<string, string>
     */
    public function toMeta(Request $request): array
    {
        return [
            'primary_route' => $this->resource['route'] ?? 'pages.show',
            'primary_category_route' => route('home.category', $this->resource['category_slug'], false),
        ];
    }

    private function exerciseHref(): string
    {
        if (isset($this->resource['route'])) {
            return route($this->resource['route'], $this->resource['route_parameters'] ?? [], false);
        }

        return route('pages.show', ['page' => $this->resource['page']], false);
    }
}
