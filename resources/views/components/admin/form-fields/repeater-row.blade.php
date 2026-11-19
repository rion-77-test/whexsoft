@props([
    'name',
    'index',
    'fields',
    'item' => [],
    'translationFields' => [],
])

<div class="border rounded p-3 mb-2" data-repeater-row>
    <div class="row g-3 align-items-start">
        @foreach ($fields as $field)
            @php
                $fieldName = $name.'['.$index.']['.$field['name'].']';
                $fieldId = $name.'-'.$index.'-'.$field['name'];
                $col = $field['col'] ?? 6;
                $type = $field['type'] ?? 'text';
                $fieldValue = $item[$field['name']] ?? ($field['default'] ?? null);
            @endphp
            <div class="col-md-{{ $col }}">
                @if ($type === 'checkbox')
                    <input type="hidden" name="{{ $fieldName }}" value="0">
                    <div class="form-check mt-4">
                        <input id="{{ $fieldId }}" name="{{ $fieldName }}" type="checkbox" value="1"
                            class="form-check-input" @checked((bool) $fieldValue)>
                        <label for="{{ $fieldId }}" class="form-check-label">{{ $field['label'] }}</label>
                    </div>
                @elseif ($type === 'textarea')
                    <label for="{{ $fieldId }}" class="form-label">{{ $field['label'] }}</label>
                    <textarea id="{{ $fieldId }}" name="{{ $fieldName }}" rows="{{ $field['rows'] ?? 2 }}"
                        class="form-control">{{ $fieldValue }}</textarea>
                @else
                    <label for="{{ $fieldId }}" class="form-label">{{ $field['label'] }}</label>
                    <input id="{{ $fieldId }}" name="{{ $fieldName }}" type="{{ $type }}"
                        class="form-control" value="{{ $fieldValue }}">
                @endif
            </div>
        @endforeach
        @foreach ($translationFields as $field)
            @php
                $fieldName = 'translations[en]['.$field['name'].']['.$index.']';
                $fieldDotName = str_replace(['[', ']'], ['.', ''], $fieldName);
                $fieldId = $fieldName;
                $col = $field['col'] ?? 12;
                $fieldValue = old($fieldDotName, $field['value'][$index] ?? ($field['default'] ?? null));
            @endphp
            <div class="col-md-{{ $col }}">
                @if (($field['type'] ?? 'text') === 'textarea')
                    <label for="{{ $fieldId }}" class="form-label">{{ $field['label'] }}</label>
                    <textarea id="{{ $fieldId }}" name="{{ $fieldName }}" rows="{{ $field['rows'] ?? 2 }}"
                        class="form-control @error($fieldDotName) is-invalid @enderror">{{ $fieldValue }}</textarea>
                @else
                    <label for="{{ $fieldId }}" class="form-label">{{ $field['label'] }}</label>
                    <input id="{{ $fieldId }}" name="{{ $fieldName }}" type="{{ $field['type'] ?? 'text' }}"
                        class="form-control @error($fieldDotName) is-invalid @enderror" value="{{ $fieldValue }}">
                @endif
                @error($fieldDotName)
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        @endforeach
        <div class="col-12 text-end">
            <button type="button" class="btn btn-sm btn-outline-danger" data-repeater-remove>
                <i class="bi bi-trash"></i> Remove
            </button>
        </div>
    </div>
</div>
