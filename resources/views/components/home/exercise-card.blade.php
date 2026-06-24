@props(['exercise'])

@php
    $href = isset($exercise['route'])
        ? route($exercise['route'], $exercise['route_parameters'] ?? [], false)
        : route('pages.show', ['page' => $exercise['page']], false);
@endphp

<article
  {{ $attributes->merge(['class' => 'exercise-card '.$exercise['card_class']]) }}
  data-category="{{ $exercise['category_slug'] }}"
  data-title="{{ $exercise['search_title'] }}"
>
  <x-home.exercise-media :media="$exercise['media']" />

  <div>
    <span class="card-tag">{{ $exercise['tag'] }}</span>
    <h3>{{ $exercise['title'] }}</h3>
    <p>{{ $exercise['date'] }}</p>
  </div>

  <a href="{{ $href }}">{{ $exercise['cta'] }}</a>
</article>
