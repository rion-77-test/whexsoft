@props([
    'name',
    'label',
    'preview' => null,
    'accept' => '.jpg,.jpeg,.png,.webp',
    'canRemove' => false,
    'removeName' => 'remove_image',
])

<div {{ $attributes }}>
    <label class="form-label d-block">{{ $label }}</label>

    @if ($preview)
        <div class="mb-3">
            <span class="d-block small text-secondary mb-1">Current image</span>
            <img src="{{ $preview }}" alt="{{ $label }} preview"
                class="rounded object-fit-cover border" style="max-width: 240px; max-height: 160px;">
        </div>
    @endif

    <input id="{{ $name }}" name="{{ $name }}" type="file" accept="{{ $accept }}"
        class="form-control @error($name) is-invalid @enderror" data-filepond>
    @error($name)<div class="invalid-feedback d-block">{{ $message }}</div>@enderror

    @if ($canRemove)
        <div class="form-check mt-2">
            <input type="hidden" name="{{ $removeName }}" value="0">
            <input id="{{ $removeName }}" name="{{ $removeName }}" type="checkbox" value="1"
                class="form-check-input">
            <label for="{{ $removeName }}" class="form-check-label">Remove current image</label>
        </div>
    @endif
</div>
