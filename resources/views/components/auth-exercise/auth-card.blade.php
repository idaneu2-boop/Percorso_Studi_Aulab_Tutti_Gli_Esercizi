@props([
    'title',
    'subtitle',
    'image' => null,
])

<section {{ $attributes->merge(['class' => 'auth-card']) }}>
    <div class="auth-card__visual">
        <img src="{{ $image ?? asset('media/autenticazione/header.gif') }}" alt="">
        <div class="auth-card__visual-content">
            <span class="auth-card__badge">
                <i class="bi bi-shield-lock-fill" aria-hidden="true"></i>
                Accesso protetto
            </span>
            <h1>NASA Mission Control</h1>
            <p>Accedi per esplorare missioni, scienza, immagini e contenuti live.</p>
        </div>
    </div>

    <div class="auth-card__panel">
        <a class="nasa-brand auth-card__brand" href="{{ route('login', absolute: false) }}">
            <span class="nasa-brand__mark">
                <img src="{{ asset('media/autenticazione/logo.png') }}" alt="" aria-hidden="true">
            </span>
            <span class="nasa-brand__label">Mission Control</span>
        </a>

        <div class="auth-card__heading">
            <p class="nasa-eyebrow">Secure gateway</p>
            <h2>{{ $title }}</h2>
            <p>{{ $subtitle }}</p>
        </div>

        {{ $slot }}
    </div>
</section>
