@props(['media'])

<figure @class(['card-media', $media['class'] ?? null]) @if ($media['hidden'] ?? false) aria-hidden="true" @endif>
  @if ($media['type'] === 'image')
    <img decoding="async" loading="lazy" src="{{ $media['src'] }}" alt="{{ $media['alt'] }}">
  @else
    <span>{{ $media['text'] ?? '' }}</span>
  @endif
</figure>
