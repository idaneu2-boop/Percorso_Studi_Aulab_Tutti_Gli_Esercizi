@props([
    'categories',
    'selectedCategory' => null,
])

<div class="category-filter">
  <button class="category-filter-button" id="categoryFilterButton" type="button" aria-expanded="false" aria-controls="categoryFilterMenu">
    <span class="category-filter-label">{{ $selectedCategory['label'] ?? 'Tutti gli esercizi' }}</span>
    <span class="category-filter-arrow" aria-hidden="true"></span>
  </button>
  <div class="category-filter-menu" id="categoryFilterMenu" hidden>
    <button
      class="category-filter-option @if (! $selectedCategory) is-active @endif"
      type="button"
      data-category=""
      data-category-url="{{ route('home', [], false) }}"
    >Tutti gli esercizi</button>

    @foreach ($categories as $category)
      <button
        class="category-filter-option @if (($selectedCategory['slug'] ?? null) === $category['slug']) is-active @endif"
        type="button"
        data-category="{{ $category['slug'] }}"
        data-category-url="{{ route('home.category', $category['slug'], false) }}"
      >{{ $category['label'] }}</button>
    @endforeach
  </div>
</div>
