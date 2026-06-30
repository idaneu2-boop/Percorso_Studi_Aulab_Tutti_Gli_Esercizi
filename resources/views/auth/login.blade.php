<x-auth-exercise.layout title="Login" :show-nav="false" :show-footer="false" body-class="auth-page">
    <main class="auth-main">
        <x-auth-exercise.auth-card
            title="Bentornato a bordo."
            subtitle="Inserisci le credenziali e rientra nella tua console missione."
            image="{{ asset('media/autenticazione/header.gif') }}"
        >
            @if ($errors->any())
                <div class="alert alert-danger mission-alert" role="alert">
                    <i class="bi bi-exclamation-triangle-fill" aria-hidden="true"></i>
                    Controlla email e password, poi riprova.
                </div>
            @endif

            <form method="POST" action="{{ route('login.store', absolute: false) }}" class="auth-form">
                @csrf

                <x-auth-exercise.form-field
                    name="email"
                    type="email"
                    label="Email"
                    icon="bi-envelope-fill"
                    :value="old('email')"
                    autocomplete="email"
                    required
                    autofocus
                />

                <x-auth-exercise.form-field
                    name="password"
                    type="password"
                    label="Password"
                    icon="bi-key-fill"
                    autocomplete="current-password"
                    required
                />

                <div class="auth-form__meta">
                    <label class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember">
                        <span class="form-check-label">Ricordami</span>
                    </label>
                </div>

                <x-auth-exercise.primary-button type="submit" icon="bi-rocket-takeoff-fill" class="w-100">
                    Entra nella missione
                </x-auth-exercise.primary-button>
            </form>

            <p class="auth-switch">
                Non hai ancora un account?
                <a href="{{ route('register', absolute: false) }}">Registrati</a>
            </p>
        </x-auth-exercise.auth-card>
    </main>
</x-auth-exercise.layout>
