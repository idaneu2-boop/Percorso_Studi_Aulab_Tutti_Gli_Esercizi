<nav class="navbar navbar-expand-lg navbar-dark site-navbar sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('haunted-houses.home') }}">
            <i class="bi bi-moon-stars-fill"></i>
            <span>Dimore Spettrali</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#hauntedHousesNavbar" aria-controls="hauntedHousesNavbar" aria-expanded="false" aria-label="Apri menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="hauntedHousesNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item">
                    <a class="btn btn-sm btn-phantom" href="{{ route('home') }}" aria-label="Torna alla pagina degli esercizi">
                        <i class="bi bi-house-door-fill" aria-hidden="true"></i>
                        Esercizi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('haunted-houses.home') ? 'active' : '' }}" href="{{ route('haunted-houses.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('haunted-houses.index') ? 'active' : '' }}" href="{{ route('haunted-houses.index') }}">Case infestate</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-sm btn-phantom" href="{{ route('haunted-houses.create') }}">
                        <i class="bi bi-plus-circle"></i>
                        Aggiungi casa
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
