<x-layout
    title="GTA VI Announcements"
    header-title="Grand Theft Auto VI"
    header-subtitle="Rumor, leak e aggiornamenti dalla community in attesa di GTA VI."
    header-kicker="Vice City"
>
    <section class="section-band">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-5" data-aos="fade-right">
                    <x-section-heading
                        :icon="$intro['icon']"
                        :kicker="$intro['kicker']"
                        :title="$intro['title']"
                        :text="$intro['text']"
                        class="section-heading-stack"
                    />
                    <div class="d-flex flex-column flex-sm-row gap-3 mt-4">
                        @foreach ($intro['actions'] as $action)
                            <a class="btn {{ $action['variant'] }}" href="{{ isset($action['route']) ? route($action['route']) : $action['url'] }}" @if ($action['external'] ?? false) target="_blank" rel="noreferrer" @endif>
                                <i class="bi {{ $action['icon'] }}" aria-hidden="true"></i>
                                <span>{{ $action['label'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="feature-grid">
                        @foreach ($features as $feature)
                            <x-feature-card
                                :delay="$loop->index * 100"
                                :icon="$feature['icon']"
                                :title="$feature['title']"
                                :text="$feature['text']"
                            />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-panel">
        <div class="container">
            <div class="row g-4">
                @foreach ($trailers as $trailer)
                    <div class="col-md-4">
                        <x-trailer-card
                            :delay="$loop->index * 100"
                            :label="$trailer['label']"
                            :title="$trailer['title']"
                            :youtube-id="$trailer['youtube_id']"
                        />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-band visual-section">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-5" data-aos="fade-right">
                    <x-section-heading
                        :icon="$atmosphere['icon']"
                        :kicker="$atmosphere['kicker']"
                        :title="$atmosphere['title']"
                        :text="$atmosphere['text']"
                        class="section-heading-stack"
                    />
                    <div class="city-signal">
                        <span><i class="bi bi-link-45deg" aria-hidden="true"></i> Fonte contenuti</span>
                        <strong>{{ $atmosphere['source'] }}</strong>
                    </div>
                </div>
                <div class="col-lg-7">
                    <x-image-carousel id="viceCityCarousel" :items="$carouselItems" data-aos="fade-left" />
                </div>
            </div>
        </div>
    </section>
</x-layout>
