@props([
    'name',
    'label',
    'type' => 'text',
    'value' => null,
    'required' => false,
    'min' => null,
    'max' => null,
])

<div {{ $attributes }}>
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}"
        class="form-control @error($name) is-invalid @enderror"
        value="{{ old($name, $value) }}"
        @if ($required) required @endif
        @if ($min !== null) min="{{ $min }}" @endif
        @if ($max !== null) max="{{ $max }}" @endif>
    @error($name)<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
