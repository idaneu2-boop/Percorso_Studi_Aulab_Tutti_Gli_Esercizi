<x-anime-tv.layout title="Inserisci il tuo Anime - Anime.TV" header-title="Inserisci il tuo Anime">
    <section class="container anime-tv-section">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7">
                <form action="{{ route('anime-tv.store') }}" method="POST" class="anime-tv-form">
                    @csrf

                    <div class="mb-4">
                        <label for="title" class="form-label">Titolo Anime</label>
                        <input
                            name="title"
                            type="text"
                            class="form-control @error('title') is-invalid @enderror"
                            id="title"
                            value="{{ old('title') }}"
                            required
                        >
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="genre" class="form-label">Genere</label>
                        <input
                            name="genre"
                            type="text"
                            class="form-control @error('genre') is-invalid @enderror"
                            id="genre"
                            value="{{ old('genre') }}"
                            required
                        >
                        @error('genre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="synopsis" class="form-label">Sinossi</label>
                        <textarea
                            name="synopsis"
                            id="synopsis"
                            class="form-control @error('synopsis') is-invalid @enderror"
                            rows="6"
                            required
                        >{{ old('synopsis') }}</textarea>
                        @error('synopsis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex flex-column flex-sm-row gap-3">
                        <button class="btn btn-anime-primary" type="submit">Inserisci</button>
                        <a class="btn btn-anime-outline" href="{{ route('anime-tv.index') }}">Anime inseriti</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-anime-tv.layout>
