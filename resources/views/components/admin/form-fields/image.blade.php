@props([
    'name',
    'label',
    'preview' => null,
    'fallback' => asset('assets/admin/images/default-fallback-image.png'),
    'accept' => '.jpg,.jpeg,.png,.webp',
    'canRemove' => false,
    'removeName' => 'remove_image',
])

<div {{ $attributes }}>
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input id="{{ $name }}" name="{{ $name }}" type="file" accept="{{ $accept }}"
        class="form-control @error($name) is-invalid @enderror">
    @error($name)<div class="invalid-feedback">{{ $message }}</div>@enderror
    <img src="{{ $preview ?: $fallback }}" alt="{{ $label }} preview"
        class="mt-3 rounded object-fit-cover" style="max-width: 240px; max-height: 160px;">
    @if ($canRemove)
        <div class="form-check mt-2">
            <input type="hidden" name="{{ $removeName }}" value="0">
            <input id="{{ $removeName }}" name="{{ $removeName }}" type="checkbox" value="1"
                class="form-check-input">
            <label for="{{ $removeName }}" class="form-check-label">Remove current image</label>
        </div>
    @endif
</div>
