<nav class="navbar navbar-expand-lg navbar-dark anime-tv-navbar fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('anime-tv.home') }}">
            <i class="bi bi-tv"></i>
            <span>Anime.TV</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#animeTvNavbar" aria-controls="animeTvNavbar" aria-expanded="false" aria-label="Apri menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="animeTvNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('anime-tv.home') ? 'active' : '' }}" href="{{ route('anime-tv.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('anime-tv.create') ? 'active' : '' }}" href="{{ route('anime-tv.create') }}">Inserisci Anime</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('anime-tv.index') ? 'active' : '' }}" href="{{ route('anime-tv.index') }}">Anime Inseriti</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-sm btn-anime-outline" href="{{ route('anime-tv.api') }}">JSON API</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
