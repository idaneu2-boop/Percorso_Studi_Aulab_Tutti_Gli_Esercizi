<footer class="site-footer">
    <div class="container">
        <div class="footer-showcase" data-aos="fade-up">
            <x-image-carousel id="footerViceCarousel" :items="$footerCarouselItems" variant="footer-carousel" />
        </div>
        
        <div class="row gy-4 align-items-center">
            <div class="col-lg-7">
                <div class="footer-brand-row">
                    <img class="footer-rockstar-logo" src="{{ asset('Rockstar-Games-Logo-emblem-of-the-renowned-game-developer-transparent-png-jpg.png') }}" alt="Rockstar Games">
                    <p class="footer-brand mb-0">GTA VI</p>
                </div>
                <p class="footer-copy mb-0">Community project dedicato a Vice City, annunci dei fan e richieste info via Mail.</p>
            </div>
            <div class="col-lg-5">
                <div class="footer-links">
                    @foreach ($footerLinks as $link)
                    <a href="{{ route($link['route']) }}">
                        <i class="bi {{ $link['icon'] }}" aria-hidden="true"></i>
                        <span>{{ $link['label'] }}</span>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="footer-bottom justify-content-center">
                    <span><i aria-hidden="true"></i> Con la bellissima collaborazione di: <a class="text-decoration-none bi bi-heart" href="https://www.linkedin.com/in/kostyantyn-hruzynskyy/"> Kostyantyn Hruzynskyy <i class="bi bi-heart"></i></a></span>
                        <span><i class="bi bi-person" aria-hidden="true">Il suo <a class="text-decoration-none" href="https://www.instagram.com/letitflow_skyy/">Instagram</a></i></span>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <span><i aria-hidden="true"></i> &copy; {{ now()->year }} GTA VI</span>
                <span><i class="bi bi-shield-check" aria-hidden="true"></i> Fan web app non ufficiale.</span>
            </div>
        </div>
    </footer>
    