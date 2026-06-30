@props([
    'videoId',
    'eyebrow',
    'title',
    'text',
])

<section {{ $attributes->merge(['class' => 'nasa-video-feature']) }} id="video">
    <div class="container-fluid px-3 px-lg-5">
        <div class="row g-4 g-xl-5 align-items-center">
            <div class="col-lg-5" data-aos="fade-right">
                <p class="nasa-eyebrow">{{ $eyebrow }}</p>
                <h2>{{ $title }}</h2>
                <p>{{ $text }}</p>
                <div class="nasa-video-feature__signals">
                    <span><i class="bi bi-broadcast-pin" aria-hidden="true"></i> NASA</span>
                    <span><i class="bi bi-youtube" aria-hidden="true"></i> YouTube</span>
                    <span><i class="bi bi-badge-hd-fill" aria-hidden="true"></i> Video</span>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="nasa-video-frame">
                    <iframe
                        src="https://www.youtube.com/embed/{{ $videoId }}"
                        title="{{ $title }}"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
