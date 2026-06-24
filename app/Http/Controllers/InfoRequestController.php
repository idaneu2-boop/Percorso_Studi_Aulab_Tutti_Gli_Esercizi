<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendInfoRequest;
use App\Mail\InfoRequestMail;
use App\Support\GtaContent;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class InfoRequestController extends Controller
{
    public function create(GtaContent $content): View
    {
        return view('info.create', [
            'infoPanel' => $content->infoPanel(),
            'topics' => $content->infoTopics(),
        ]);
    }

    public function store(SendInfoRequest $request): RedirectResponse
    {
        Mail::to(config('mail.from.address'))->send(new InfoRequestMail($request->validated()));

        return redirect()
            ->route('info.create')
            ->with('status', 'Richiesta inviata: la mail e ora visibile su Mailtrap.');
    }
}
