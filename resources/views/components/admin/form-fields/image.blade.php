@props([
    'name',
    'label',
    'preview' => null,
    'accept' => '.jpg,.jpeg,.png,.webp',
    'canRemove' => false,
    'removeName' => 'remove_image',
    'multiple' => false,
    'maxFiles' => 10,
    'help' => null,
])

<div {{ $attributes }}>
    <label class="form-label d-block">{{ $label }}</label>

    @if ($preview && ! $multiple)
        <div class="mb-3 p-2 border rounded bg-body-tertiary d-inline-block">
            <span class="d-block small text-secondary mb-1">Current image</span>
            <img src="{{ $preview }}" alt="{{ $label }} preview"
                class="rounded object-fit-cover d-block" style="max-width: 240px; max-height: 160px;">
        </div>
    @endif

    <input id="{{ $name }}" name="{{ $multiple ? $name.'[]' : $name }}" type="file" accept="{{ $accept }}"
        class="form-control @error($name) is-invalid @enderror" data-filepond
        @if ($multiple) multiple data-multiple data-max-files="{{ $maxFiles }}" @endif>

    @if ($help)
        <div class="form-text">{{ $help }}</div>
    @endif

    @error($name)<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    @if ($multiple)
        @foreach ($errors->get($name.'.*') as $messages)
            @foreach ($messages as $message)
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @endforeach
        @endforeach
    @endif

    @if ($canRemove && ! $multiple)
        <div class="form-check mt-2">
            <input type="hidden" name="{{ $removeName }}" value="0">
            <input id="{{ $removeName }}" name="{{ $removeName }}" type="checkbox" value="1"
                class="form-check-input">
            <label for="{{ $removeName }}" class="form-check-label">
                Remove current image <span class="text-secondary">(ignored if you upload a new one)</span>
            </label>
        </div>
    @endif
</div>