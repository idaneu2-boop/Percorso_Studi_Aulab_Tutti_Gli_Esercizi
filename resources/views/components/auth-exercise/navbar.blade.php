<nav class="navbar navbar-expand-lg navbar-dark nasa-navbar fixed-top">
    <div class="container-fluid px-3 px-lg-5">
        <a class="navbar-brand nasa-brand" href="{{ route('autenticazione.home', absolute: false) }}" aria-label="NASA Mission Control">
            <span class="nasa-brand__mark">
                <img src="{{ asset('media/autenticazione/logo.png') }}" alt="" aria-hidden="true">
            </span>
            <span class="nasa-brand__label">Mission Control</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nasaNavigation" aria-controls="nasaNavigation" aria-expanded="false" aria-label="Apri navigazione">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nasaNavigation">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home', absolute: false) }}">Esercizi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('autenticazione.home', absolute: false) }}#missioni">Missioni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('autenticazione.home', absolute: false) }}#scienza">Scienza</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('autenticazione.home', absolute: false) }}#video">NASA Video</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('autenticazione.home', absolute: false) }}#galleria">Galleria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('autenticazione.posts.index', absolute: false) }}">Post</a>
                </li>
            </ul>

            <div class="d-flex align-items-center gap-3">
                @auth
                    <span class="nasa-user d-none d-xl-inline">
                        <i class="bi bi-person-check-fill" aria-hidden="true"></i>
                        {{ auth()->user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout', absolute: false) }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light nasa-logout">
                            <i class="bi bi-box-arrow-right" aria-hidden="true"></i>
                            Logout
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>
