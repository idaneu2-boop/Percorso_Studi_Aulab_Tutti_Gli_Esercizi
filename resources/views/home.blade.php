<x-home.layout :title="$title">
  <header class="site-header">
    <x-home.nav :profile="$profile" :categories="$categories" :selected-category="$selectedCategory" />
    <x-home.hero :hero="$hero" />
  </header>

  <main>
    <x-home.search-tools />

    <section id="esercizi" class="exercise-section">
      <div class="section-title">
        <p class="eyebrow">Link rapidi</p>
        <h2 id="exerciseTitle">{{ $pageHeading }}</h2>
      </div>

      <div class="exercise-grid" id="exerciseGrid">
        @foreach ($exercises as $exercise)
          <x-home.exercise-card :exercise="$exercise" />
        @endforeach
      </div>

      <p class="empty-state" id="emptyState" hidden>Nessun esercizio trovato.</p>
    </section>
  </main>

  <x-home.footer :contacts="$contacts" />
  <x-home.helper />
</x-home.layout>
