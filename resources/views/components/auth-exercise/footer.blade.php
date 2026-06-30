<footer class="nasa-footer">
    <div class="container-fluid px-3 px-lg-5">
        <div class="row g-4 align-items-end">
            <div class="col-lg-6">
                <a class="nasa-brand nasa-brand--footer" href="{{ route('autenticazione.home', absolute: false) }}">
                    <span class="nasa-brand__mark">
                        <img src="{{ asset('media/autenticazione/logo.png') }}" alt="" aria-hidden="true">
                    </span>
                    <span class="nasa-brand__label">Mission Control</span>
                </a>
                <p class="nasa-footer__text">
                    NASA esplora l'ignoto nell'aria e nello spazio, innova per il beneficio dell'umanita e ispira il mondo attraverso la scoperta.
                </p>
            </div>
            <div class="col-lg-6">
                <img class="nasa-footer__wordmark" src="{{ asset('media/autenticazione/logo2.png') }}" alt="NASA">
                <div class="nasa-footer__links">
                    <a href="{{ route('home', absolute: false) }}">Dashboard esercizi</a>
                    <a href="https://www.nasa.gov/" target="_blank" rel="noreferrer">NASA.gov</a>
                    <a href="https://images.nasa.gov/" target="_blank" rel="noreferrer">NASA Images</a>
                    <a href="https://www.youtube.com/@NASA" target="_blank" rel="noreferrer">YouTube NASA</a>
                </div>
            </div>
        </div>
    </div>
</footer>
