@props([
    'id',
    'items',
    'variant' => 'neon-carousel',
])

<div id="{{ $id }}" {{ $attributes->merge(['class' => 'carousel slide '.$variant]) }} data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach ($items as $item)
            <button
                type="button"
                data-bs-target="#{{ $id }}"
                data-bs-slide-to="{{ $loop->index }}"
                @class(['active' => $loop->first])
                @if ($loop->first) aria-current="true" @endif
                aria-label="{{ $item['alt'] ?? 'Scenario '.($loop->iteration) }}"
            ></button>
        @endforeach
    </div>

    <div class="carousel-inner">
        @foreach ($items as $item)
            <div @class(['carousel-item', 'active' => $loop->first])>
                <img src="{{ asset($item['image']) }}" class="d-block w-100" alt="{{ $item['alt'] }}">

                @if (isset($item['caption']))
                    <div class="carousel-caption">
                        @if (isset($item['kicker']))
                            <span>
                                @if (isset($item['icon']))
                                    <i class="bi {{ $item['icon'] }}" aria-hidden="true"></i>
                                @endif
                                {{ $item['kicker'] }}
                            </span>
                        @endif
                        <strong>{{ $item['caption'] }}</strong>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#{{ $id }}" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Precedente</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#{{ $id }}" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Successiva</span>
    </button>
</div>
