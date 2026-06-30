@props([
    'action' => route('autenticazione.posts.store', absolute: false),
    'method' => 'POST',
    'post' => null,
    'submitLabel' => 'Pubblica post',
])

<form method="POST" action="{{ $action }}" class="nasa-post-form">
    @csrf
    @if (strtoupper($method) !== 'POST')
        @method($method)
    @endif

    @php
        $publishedAt = old('published_at', $post?->published_at?->toDateString() ?? now()->toDateString());
    @endphp

    <div class="row g-3">
        <div class="col-12">
            <label for="title" class="form-label">Titolo</label>
            <input
                id="title"
                name="title"
                type="text"
                value="{{ old('title', $post?->title) }}"
                class="form-control @error('title') is-invalid @enderror"
                maxlength="160"
                required
            >
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label for="excerpt" class="form-label">Riassunto</label>
            <textarea
                id="excerpt"
                name="excerpt"
                rows="3"
                class="form-control @error('excerpt') is-invalid @enderror"
                maxlength="500"
                required
            >{{ old('excerpt', $post?->excerpt) }}</textarea>
            @error('excerpt')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label for="body" class="form-label">Contenuto</label>
            <textarea
                id="body"
                name="body"
                rows="6"
                class="form-control @error('body') is-invalid @enderror"
                required
            >{{ old('body', $post?->body) }}</textarea>
            @error('body')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-7">
            <label for="source_url" class="form-label">Link fonte</label>
            <input
                id="source_url"
                name="source_url"
                type="url"
                value="{{ old('source_url', $post?->source_url) }}"
                class="form-control @error('source_url') is-invalid @enderror"
                placeholder="https://www.nasa.gov/..."
            >
            @error('source_url')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-5">
            <label for="published_at" class="form-label">Data pubblicazione</label>
            <input
                id="published_at"
                name="published_at"
                type="date"
                value="{{ $publishedAt }}"
                class="form-control @error('published_at') is-invalid @enderror"
            >
            @error('published_at')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-nasa btn-lg w-100 mt-4">
        <i class="bi bi-send-fill" aria-hidden="true"></i>
        {{ $submitLabel }}
    </button>
</form>
