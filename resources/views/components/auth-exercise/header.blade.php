@props([
    'eyebrow' => 'NASA',
    'title',
    'subtitle',
    'image',
])

<header {{ $attributes->merge(['class' => 'nasa-hero']) }}>
    <img class="nasa-hero__image" src="{{ $image }}" alt="">
    <div class="nasa-hero__shade" aria-hidden="true"></div>

    <div class="container-fluid px-3 px-lg-5 position-relative">
        <div class="row min-vh-100 align-items-end align-items-lg-center">
            <div class="col-12 col-lg-8 col-xxl-7">
                <div class="nasa-hero__content" data-aos="fade-up">
                    <p class="nasa-eyebrow">{{ $eyebrow }}</p>
                    <h1>{{ $title }}</h1>
                    <p class="nasa-hero__subtitle">{{ $subtitle }}</p>

                    @isset($actions)
                        <div class="nasa-hero__actions">
                            {{ $actions }}
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</header>
