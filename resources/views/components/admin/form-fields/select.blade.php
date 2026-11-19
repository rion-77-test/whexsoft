@props([
    'name',
    'label',
    'options',
    'value' => null,
    'placeholder' => null,
    'required' => false,
])

@php
    $dotName = str_replace(['[', ']'], ['.', ''], $name);
@endphp

<div {{ $attributes }}>
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <select id="{{ $name }}" name="{{ $name }}"
        class="form-select @error($dotName) is-invalid @enderror"
        @if ($required) required @endif>
        @if ($placeholder !== null)
            <option value="">{{ $placeholder }}</option>
        @endif
        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}"
                @selected((string) old($dotName, $value) === (string) $optionValue)>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>
    @error($dotName)<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
