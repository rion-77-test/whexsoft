@props([
    'name',
    'label',
    'checked' => false,
])

<div {{ $attributes->class(['form-check']) }}>
    <input type="hidden" name="{{ $name }}" value="0">
    <input id="{{ $name }}" name="{{ $name }}" type="checkbox" value="1"
        class="form-check-input @error($name) is-invalid @enderror"
        @checked((bool) old($name, $checked))>
    <label for="{{ $name }}" class="form-check-label">{{ $label }}</label>
    @error($name)<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
