import * as FilePond from 'filepond';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginImageExifOrientation from 'filepond-plugin-image-exif-orientation';

import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';

FilePond.registerPlugin(FilePondPluginImagePreview, FilePondPluginImageExifOrientation);

const initializeImageFields = () => {
    document.querySelectorAll('input[data-filepond]').forEach((input) => {
        if (input.dataset.filepondInitialized === 'true') {
            return;
        }

        input.dataset.filepondInitialized = 'true';

        FilePond.create(input, {
            allowMultiple: false,
            credits: false,
            storeAsFile: true,
            instantUpload: false,
            allowImagePreview: true,
            imagePreviewMaxHeight: 200,
            acceptedFileTypes: ['image/jpeg', 'image/png', 'image/webp'],
            labelIdle:
                'Drag & drop an image or <span class="filepond--label-action">Browse</span>',
        });
    });
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeImageFields);
} else {
    initializeImageFields();
}
