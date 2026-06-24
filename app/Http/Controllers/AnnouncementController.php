<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnnouncementRequest;
use App\Models\Announcement;
use App\Services\AnnouncementFeed;
use App\Support\GtaContent;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AnnouncementController extends Controller
{
    public function index(AnnouncementFeed $announcementFeed): View
    {
        return view('announcements.index', [
            'announcements' => $announcementFeed->all(),
        ]);
    }

    public function create(GtaContent $content): View
    {
        return view('announcements.create', [
            'categories' => $content->announcementCategories(),
            'formPanel' => $content->announcementFormPanel(),
        ]);
    }

    public function store(StoreAnnouncementRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['is_spoiler'] = $request->boolean('is_spoiler');
        unset($validated['image']);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('announcements', 'public');
        }

        $announcement = Announcement::create($validated);

        return redirect()
            ->route('announcements.show', $announcement)
            ->with('status', 'Leak caricato nella board di Vice City.');
    }

    public function show(Announcement $announcement): View
    {
        return view('announcements.show', [
            'announcement' => $announcement,
        ]);
    }

    public function showStatic(string $announcement, AnnouncementFeed $announcementFeed): View
    {
        $staticAnnouncement = $announcementFeed->findStatic($announcement);

        abort_unless($staticAnnouncement, 404);

        return view('announcements.show', [
            'announcement' => $staticAnnouncement,
        ]);
    }
}
