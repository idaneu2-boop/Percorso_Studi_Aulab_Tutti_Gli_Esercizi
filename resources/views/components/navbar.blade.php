<nav class="navbar navbar-expand-lg site-navbar sticky-top" data-aos="fade-down" data-aos-duration="500">
    <div class="container">
        <a class="navbar-brand brand-mark" href="{{ route('gta.home') }}" data-aos="zoom-in" data-aos-delay="120">
            <img class="brand-logo" src="{{ asset('Rockstar-Games-Logo-emblem-of-the-renowned-game-developer-transparent-png-jpg.png') }}" alt="Logo GTA VI">
            <span class="brand-title">GTA VI</span>
        </a>

        <div class="site-nav-actions" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                @foreach ($navigationLinks as $link)
                    <li class="nav-item" data-aos="fade-down" data-aos-delay="180">
                        <a @class([
                            'btn btn-neon btn-sm' => $link['variant'] === 'button',
                            'btn btn-outline-neon btn-sm' => $link['variant'] === 'outline-button',
                            'nav-link' => $link['variant'] === 'link',
                            'active' => $link['variant'] === 'link' && request()->routeIs($link['active']),
                        ]) href="{{ route($link['route']) }}">
                            <i class="bi {{ $link['icon'] }}" aria-hidden="true"></i>
                            <span>{{ $link['label'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <button class="theme-toggle ms-lg-3 mt-3 mt-lg-0" type="button" data-theme-toggle aria-pressed="false">
                <i class="bi bi-sun-fill" data-theme-icon aria-hidden="true"></i>
                <span data-theme-label>Light</span>
            </button>
        </div>
    </div>
</nav>
