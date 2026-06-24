@props([
    'accept' => null,
    'hint' => null,
    'icon' => null,
    'label',
    'name',
    'options' => [],
    'placeholder' => null,
    'required' => false,
    'rows' => 5,
    'type' => 'text',
    'value' => null,
])

@php
    $fieldId = $attributes->get('id', $name);
    $fieldValue = old($name, $value);
@endphp

<div {{ $attributes->except('id')->merge(['class' => 'col-12']) }}>
    <label class="form-label" for="{{ $fieldId }}">
        @if ($icon)
            <i class="bi {{ $icon }}" aria-hidden="true"></i>
        @endif
        <span>{{ $label }}</span>
    </label>

    @if ($type === 'select')
        <select class="form-select @error($name) is-invalid @enderror" id="{{ $fieldId }}" name="{{ $name }}" @if ($required) required @endif>
            @if ($placeholder)
                <option value="">{{ $placeholder }}</option>
            @endif

            @foreach ($options as $option)
                @php
                    $optionValue = is_array($option) ? $option['value'] : $option;
                    $optionLabel = is_array($option) ? $option['label'] : $option;
                @endphp
                <option value="{{ $optionValue }}" @selected($fieldValue === $optionValue)>{{ $optionLabel }}</option>
            @endforeach
        </select>
    @elseif ($type === 'textarea')
        <textarea class="form-control @error($name) is-invalid @enderror" id="{{ $fieldId }}" name="{{ $name }}" rows="{{ $rows }}" @if ($required) required @endif>{{ $fieldValue }}</textarea>
    @else
        <input
            class="form-control @error($name) is-invalid @enderror"
            id="{{ $fieldId }}"
            type="{{ $type }}"
            name="{{ $name }}"
            @if ($type !== 'file') value="{{ $fieldValue }}" @endif
            @if ($placeholder) placeholder="{{ $placeholder }}" @endif
            @if ($accept) accept="{{ $accept }}" @endif
            @if ($required) required @endif
        >
    @endif

    @if ($hint)
        <p class="form-hint mb-0">{{ $hint }}</p>
    @endif

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
