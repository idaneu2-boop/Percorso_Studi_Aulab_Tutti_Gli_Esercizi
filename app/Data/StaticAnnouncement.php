<?php

namespace App\Data;

use Carbon\CarbonImmutable;
use Illuminate\Support\Arr;

class StaticAnnouncement
{
    /**
     * @param  array<string, mixed>  $announcement
     */
    public static function fromArray(array $announcement): self
    {
        return new self(
            slug: (string) Arr::get($announcement, 'slug'),
            reporter_name: (string) Arr::get($announcement, 'reporter_name'),
            reporter_email: (string) Arr::get($announcement, 'reporter_email'),
            title: (string) Arr::get($announcement, 'title'),
            category: (string) Arr::get($announcement, 'category'),
            location: (string) Arr::get($announcement, 'location'),
            credibility: (int) Arr::get($announcement, 'credibility', 3),
            is_spoiler: (bool) Arr::get($announcement, 'is_spoiler', false),
            body: (string) Arr::get($announcement, 'body'),
            created_at: CarbonImmutable::parse((string) Arr::get($announcement, 'created_at')),
            source_type: (string) Arr::get($announcement, 'source_type', 'reported_leak'),
            source_label: (string) Arr::get($announcement, 'source_label', 'Non ufficiale'),
            source_url: (string) Arr::get($announcement, 'source_url'),
            detail_image_url: (string) Arr::get($announcement, 'detail_image_url'),
        );
    }

    public function __construct(
        public string $slug,
        public string $reporter_name,
        public string $reporter_email,
        public string $title,
        public string $category,
        public string $location,
        public int $credibility,
        public bool $is_spoiler,
        public string $body,
        public CarbonImmutable $created_at,
        public string $source_type,
        public string $source_label,
        public string $source_url,
        public string $detail_image_url,
    ) {}

}
