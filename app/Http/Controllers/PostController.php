<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Support\PostFeed;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index(PostFeed $postFeed): View
    {
        Gate::authorize('viewAny', Post::class);

        $posts = $postFeed->all()->map(function (array $post): array {
            $post['can_update'] = $post['model'] instanceof Post && Gate::allows('update', $post['model']);
            $post['can_delete'] = $post['model'] instanceof Post && Gate::allows('delete', $post['model']);

            return $post;
        });

        return view('auth-exercise.posts.index', [
            'posts' => $posts,
        ]);
    }

    public function create(): View
    {
        Gate::authorize('create', Post::class);

        return view('auth-exercise.posts.create');
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $post = Post::create([
            ...$request->validated(),
            'user_id' => $request->user()->id,
        ]);

        return redirect()
            ->route('autenticazione.posts.show', $post)
            ->with('status', 'Post pubblicato.');
    }

    public function show(Post $post): View
    {
        Gate::authorize('view', $post);

        $post->load('user:id,name');

        return view('auth-exercise.posts.show', [
            'post' => $post,
        ]);
    }

    public function edit(Post $post): View
    {
        Gate::authorize('update', $post);

        return view('auth-exercise.posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $post->update($request->validated());

        return redirect()
            ->route('autenticazione.posts.show', $post)
            ->with('status', 'Post aggiornato.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        Gate::authorize('delete', $post);

        $post->delete();

        return redirect()
            ->route('autenticazione.posts.index')
            ->with('status', 'Post cancellato.');
    }
}
