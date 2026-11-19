@props([
    'name',
    'label',
    'value' => null,
    'rows' => 4,
])

@php
    $dotName = str_replace(['[', ']'], ['.', ''], $name);
@endphp

<div {{ $attributes }}>
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <textarea id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}"
        class="form-control @error($dotName) is-invalid @enderror">{{ old($dotName, $value) }}</textarea>
    @error($dotName)<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
