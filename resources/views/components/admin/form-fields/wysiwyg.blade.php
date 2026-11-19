@props([
    'name',
    'label',
    'value' => null,
    'uploadUrl',
    'required' => false,
])

@php
    $dotName = str_replace(['[', ']'], ['.', ''], $name);
    $editorId = $name.'-editor';
    $valueId = $name.'-value';
    $imageInputId = $name.'-image-upload';
    $errorId = $name.'-image-error';
@endphp

@pushOnce('styles')
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css"
        integrity="sha384-ecIckRi4QlKYya/FQUbBUjS4qp65jF/J87Guw5uzTbO1C1Jfa/6kYmd6dXUF6D7i"
        crossorigin="anonymous">
    <style>
        .ql-container[data-wysiwyg-editor] {
            height: auto;
        }

        .ql-editor {
            min-height: 18rem;
        }
    </style>
@endPushOnce

<div {{ $attributes }}>
    <label for="{{ $editorId }}" class="form-label">{{ $label }}</label>
    <div id="{{ $editorId }}" data-wysiwyg-editor data-value-id="{{ $valueId }}"
        data-image-input-id="{{ $imageInputId }}" data-upload-url="{{ $uploadUrl }}"
        data-required="{{ $required ? 'true' : 'false' }}"></div>
    <textarea id="{{ $valueId }}" name="{{ $name }}" class="d-none">{{ old($dotName, $value) }}</textarea>
    <input id="{{ $imageInputId }}" type="file" accept=".jpg,.jpeg,.png,.webp" class="d-none">
    <div id="{{ $errorId }}" class="text-danger mt-2" role="alert" aria-live="polite" hidden></div>
    @error($dotName)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

@pushOnce('scripts')
    <script
        src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"
        integrity="sha384-utBUCeG4SYaCm4m7GQZYr8Hy8Fpy3V4KGjBZaf4WTKOcwhCYpt/0PfeEe3HNlwx8"
        crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('[data-wysiwyg-editor]').forEach((editorElement) => {
                const form = editorElement.closest('form');
                const contentField = document.getElementById(editorElement.dataset.valueId);
                const imageInput = document.getElementById(editorElement.dataset.imageInputId);
                const uploadError = editorElement.parentElement.querySelector('[role="alert"]');
                const csrfToken = form.querySelector('input[name="_token"]').value;
                const isRequired = editorElement.dataset.required === 'true';
                let uploadInProgress = false;

                const editor = new Quill(editorElement, {
                    theme: 'snow',
                    modules: {
                        toolbar: {
                            container: [
                                [{ header: [1, 2, 3, false] }],
                                ['bold', 'italic', 'underline', 'strike'],
                                [{ list: 'ordered' }, { list: 'bullet' }],
                                [{ indent: '-1' }, { indent: '+1' }],
                                [{ align: [] }],
                                ['blockquote', 'code-block'],
                                ['link', 'image', 'clean'],
                            ],
                            handlers: {
                                image() {
                                    imageInput.click();
                                },
                            },
                        },
                    },
                });

                if (contentField.value.trim()) {
                    editor.clipboard.dangerouslyPasteHTML(contentField.value, 'silent');
                }

                imageInput.addEventListener('change', async () => {
                    const [image] = imageInput.files;

                    if (!image) {
                        return;
                    }

                    uploadInProgress = true;
                    imageInput.disabled = true;
                    uploadError.hidden = true;

                    try {
                        const formData = new FormData();
                        formData.append('image', image);

                        const response = await fetch(editorElement.dataset.uploadUrl, {
                            method: 'POST',
                            headers: {
                                Accept: 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                            },
                            body: formData,
                        });
                        const result = await response.json();

                        if (!response.ok || !result.url) {
                            throw new Error(result.errors?.image?.[0] || result.message || 'Image upload failed.');
                        }

                        const range = editor.getSelection(true) || { index: editor.getLength() };
                        editor.insertEmbed(range.index, 'image', result.url, 'user');
                        editor.setSelection(range.index + 1, 0, 'silent');
                    } catch (error) {
                        uploadError.textContent = error.message || 'Image upload failed.';
                        uploadError.hidden = false;
                    } finally {
                        uploadInProgress = false;
                        imageInput.disabled = false;
                        imageInput.value = '';
                    }
                });

                form.addEventListener('submit', (event) => {
                    if (uploadInProgress) {
                        event.preventDefault();
                        uploadError.textContent = 'Wait for the image upload to finish before saving.';
                        uploadError.hidden = false;

                        return;
                    }

                    contentField.value = editor.getSemanticHTML();

                    if (isRequired && editor.getText().trim() === '' && editor.root.querySelector('img') === null) {
                        event.preventDefault();
                        uploadError.textContent = 'The content field is required.';
                        uploadError.hidden = false;
                        editor.focus();
                    }
                });
            });
        });
    </script>
@endPushOnce
