@props([
    'name',
    'label',
    'fields',
    'value' => [],
    'translationFields' => [],
    'addLabel' => 'Add item',
    'emptyText' => 'No items yet.',
])

@php
    $dotName = str_replace(['[', ']'], ['.', ''], $name);
    $items = old($dotName, $value);
    $items = is_array($items) ? array_values($items) : [];
@endphp

<div {{ $attributes->merge(['class' => 'repeater']) }} data-repeater data-repeater-name="{{ $name }}">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-2">
        <label class="form-label mb-0">{{ $label }}</label>
        <button type="button" class="btn btn-sm btn-outline-primary" data-repeater-add>
            <i class="bi bi-plus-lg me-1"></i> {{ $addLabel }}
        </button>
    </div>

    <div data-repeater-items>
        @foreach ($items as $index => $item)
            <x-admin.form-fields.repeater-row :name="$name" :index="$index" :fields="$fields"
                :item="is_array($item) ? $item : []" :translation-fields="$translationFields" />
        @endforeach
    </div>

    <div class="text-secondary small" data-repeater-empty @if ($items !== []) hidden @endif>
        {{ $emptyText }}
    </div>

    <template data-repeater-template>
        <x-admin.form-fields.repeater-row :name="$name" index="__INDEX__" :fields="$fields"
            :translation-fields="$translationFields" />
    </template>
</div>

@pushOnce('scripts', 'repeater')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('[data-repeater]').forEach((repeater) => {
                const items = repeater.querySelector('[data-repeater-items]');
                const template = repeater.querySelector('[data-repeater-template]');
                const empty = repeater.querySelector('[data-repeater-empty]');
                const addButton = repeater.querySelector('[data-repeater-add]');
                let nextIndex = 0;

                repeater.querySelectorAll('[name]').forEach((input) => {
                    const match = input.name.match(/\[(\d+)\]/);

                    if (match) {
                        nextIndex = Math.max(nextIndex, Number(match[1]) + 1);
                    }
                });

                const updateEmptyState = () => {
                    if (empty) {
                        empty.hidden = items.querySelector('[data-repeater-row]') !== null;
                    }
                };

                addButton.addEventListener('click', () => {
                    items.insertAdjacentHTML('beforeend', template.innerHTML.replaceAll('__INDEX__', String(nextIndex)));
                    nextIndex += 1;
                    updateEmptyState();
                });

                items.addEventListener('click', (event) => {
                    const removeButton = event.target.closest('[data-repeater-remove]');

                    if (! removeButton) {
                        return;
                    }

                    removeButton.closest('[data-repeater-row]').remove();
                    updateEmptyState();
                });

                updateEmptyState();
            });
        });
    </script>
@endPushOnce
