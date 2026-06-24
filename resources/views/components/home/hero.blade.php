@props(['hero'])

<section class="hero">
  <div class="hero-content">
    <p class="eyebrow">{{ $hero['kicker'] }}</p>
    <h1>{{ $hero['title'] }}</h1>
    <p class="hero-copy">
      {{ $hero['copy'] }}
    </p>
  </div>
  <div class="hero-panel" aria-label="Riepilogo esercizi">
    <span class="panel-number" id="linkedPagesCount">0</span>
    <span class="panel-label">pagine collegate</span>
  </div>
</section>
