@props([
    'name',
    'label',
    'type' => 'text',
    'value' => null,
    'icon' => null,
])

@php
    $hasError = $errors->has($name);
@endphp

<div class="mission-field">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <div class="input-group input-group-lg">
        @if ($icon)
            <span class="input-group-text">
                <i class="bi {{ $icon }}" aria-hidden="true"></i>
            </span>
        @endif

        <input
            id="{{ $name }}"
            name="{{ $name }}"
            type="{{ $type }}"
            value="{{ $type === 'password' ? '' : $value }}"
            {{ $attributes->merge(['class' => 'form-control'.($hasError ? ' is-invalid' : '')]) }}
        >

        @error($name)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
