@props([
    'name',
    'label',
    'type' => 'text',
    'value' => null,
    'required' => false,
    'min' => null,
    'max' => null,
])

@php
    $dotName = str_replace(['[', ']'], ['.', ''], $name);
@endphp

<div {{ $attributes }}>
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}"
        class="form-control @error($dotName) is-invalid @enderror"
        value="{{ old($dotName, $value) }}"
        @if ($required) required @endif
        @if ($min !== null) min="{{ $min }}" @endif
        @if ($max !== null) max="{{ $max }}" @endif>
    @error($dotName)<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
