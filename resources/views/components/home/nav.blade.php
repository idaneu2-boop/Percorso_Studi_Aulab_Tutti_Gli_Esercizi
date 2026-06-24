@props([
    'categories',
    'profile',
    'selectedCategory' => null,
])

<nav class="nav">
  <div class="brand">
    <a class="brand-mark" href="{{ $profile['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="Apri Instagram di Daniele Pigliacelli">
      <img decoding="async" loading="lazy" src="{{ $profile['image'] }}" alt="{{ $profile['image_alt'] }}">
    </a>
    <a class="brand-name" href="{{ $profile['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="Apri Instagram di Daniele Pigliacelli">{{ $profile['name'] }}</a>
  </div>

  <x-home.category-filter :categories="$categories" :selected-category="$selectedCategory" />

  <button class="home-theme-toggle" id="homeThemeToggle" type="button" aria-label="Attiva modalita light">
    <i class="fa-solid fa-moon"></i>
  </button>
</nav>
