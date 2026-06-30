<x-auth-exercise.layout title="Registrazione" :show-nav="false" :show-footer="false" body-class="auth-page">
    <main class="auth-main">
        <x-auth-exercise.auth-card
            title="Prepara il tuo lancio."
            subtitle="Crea un account per accedere alla tua area Mission Control."
            image="{{ asset('media/autenticazione/supernovae.gif') }}"
        >
            @if ($errors->any())
                <div class="alert alert-danger mission-alert" role="alert">
                    <i class="bi bi-exclamation-triangle-fill" aria-hidden="true"></i>
                    Alcuni dati non sono validi. Correggili e riprova.
                </div>
            @endif

            <form method="POST" action="{{ route('register.store', absolute: false) }}" class="auth-form">
                @csrf

                <x-auth-exercise.form-field
                    name="name"
                    label="Nome"
                    icon="bi-person-fill"
                    :value="old('name')"
                    autocomplete="name"
                    required
                    autofocus
                />

                <x-auth-exercise.form-field
                    name="email"
                    type="email"
                    label="Email"
                    icon="bi-envelope-fill"
                    :value="old('email')"
                    autocomplete="email"
                    required
                />

                <x-auth-exercise.form-field
                    name="password"
                    type="password"
                    label="Password"
                    icon="bi-key-fill"
                    autocomplete="new-password"
                    required
                />

                <x-auth-exercise.form-field
                    name="password_confirmation"
                    type="password"
                    label="Conferma password"
                    icon="bi-lock-fill"
                    autocomplete="new-password"
                    required
                />

                <x-auth-exercise.primary-button type="submit" icon="bi-person-plus-fill" class="w-100">
                    Crea account
                </x-auth-exercise.primary-button>
            </form>

            <p class="auth-switch">
                Hai gia un account?
                <a href="{{ route('login', absolute: false) }}">Fai login</a>
            </p>
        </x-auth-exercise.auth-card>
    </main>
</x-auth-exercise.layout>
