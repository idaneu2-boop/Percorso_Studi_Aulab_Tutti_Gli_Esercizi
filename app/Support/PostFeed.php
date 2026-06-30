<?php

namespace App\Support;

use App\Models\Post;
use Carbon\CarbonImmutable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use JsonException;

class PostFeed
{
    /**
     * @return Collection<int, array{
     *     source_type: string,
     *     source_label: string,
     *     model: Post|null,
     *     id: int|string,
     *     title: string,
     *     excerpt: string,
     *     body: string,
     *     author: string,
     *     source_url: string|null,
     *     published_at: CarbonImmutable|Carbon|null,
     *     sort_timestamp: int
     * }>
     */
    public function all(): Collection
    {
        return $this->databasePosts()
            ->concat($this->jsonPosts())
            ->sortByDesc('sort_timestamp')
            ->values();
    }

    /**
     * @return Collection<int, array<string, mixed>>
     */
    private function databasePosts(): Collection
    {
        return Post::query()
            ->with('user:id,name')
            ->latest()
            ->get()
            ->map(function (Post $post): array {
                $publishedAt = $post->published_at ?? $post->created_at;

                return [
                    'source_type' => 'database',
                    'source_label' => 'Mission Control',
                    'model' => $post,
                    'id' => $post->id,
                    'title' => $post->title,
                    'excerpt' => $post->excerpt,
                    'body' => $post->body,
                    'author' => $post->user?->name ?? 'Mission Control',
                    'source_url' => $post->source_url,
                    'published_at' => $publishedAt,
                    'sort_timestamp' => $publishedAt?->getTimestamp() ?? 0,
                ];
            });
    }

    /**
     * @return Collection<int, array<string, mixed>>
     */
    private function jsonPosts(): Collection
    {
        $path = resource_path('data/nasa-posts.json');

        if (! File::exists($path)) {
            return collect();
        }

        try {
            $posts = json_decode(File::get($path), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            return collect();
        }

        return collect($posts)->map(function (array $post): array {
            $publishedAt = CarbonImmutable::parse($post['published_at']);

            return [
                'source_type' => 'json',
                'source_label' => 'NASA.gov',
                'model' => null,
                'id' => $post['id'],
                'title' => $post['title'],
                'excerpt' => $post['excerpt'],
                'body' => $post['body'],
                'author' => $post['author'] ?? 'NASA',
                'source_url' => $post['source_url'] ?? null,
                'published_at' => $publishedAt,
                'sort_timestamp' => $publishedAt->getTimestamp(),
            ];
        });
    }
}
