<?php

namespace App\Services;

use App\Data\StaticAnnouncement;
use App\Models\Announcement;
use Illuminate\Database\QueryException;
use Illuminate\Database\SQLiteDatabaseDoesNotExistException;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class AnnouncementFeed
{
    /**
     * @return Collection<int, Announcement|StaticAnnouncement>
     */
    public function all(): Collection
    {
        return $this->databaseAnnouncements()
            ->concat($this->staticAnnouncements())
            ->values();
    }

    public function findStatic(string $slug): ?StaticAnnouncement
    {
        return $this->staticAnnouncements()
            ->first(fn (StaticAnnouncement $announcement): bool => $announcement->slug === $slug);
    }

    /**
     * @return Collection<int, Announcement>
     */
    private function databaseAnnouncements(): Collection
    {
        try {
            return Announcement::query()
                ->latest()
                ->get();
        } catch (QueryException|SQLiteDatabaseDoesNotExistException) {
            return collect();
        }
    }

    /**
     * @return Collection<int, StaticAnnouncement>
     */
    private function staticAnnouncements(): Collection
    {
        $path = resource_path('data/announcements.json');

        if (! File::exists($path)) {
            return collect();
        }

        $payload = json_decode(File::get($path), true, 512, JSON_THROW_ON_ERROR);

        return collect(Arr::get($payload, 'announcements', []))
            ->map(fn (array $announcement): StaticAnnouncement => StaticAnnouncement::fromArray($announcement))
            ->sortByDesc(fn (StaticAnnouncement $announcement): int => $announcement->created_at->timestamp)
            ->values();
    }
}
