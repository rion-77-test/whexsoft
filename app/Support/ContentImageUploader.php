<?php

namespace App\Support;

use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;

class ContentImageUploader
{
    /**
     * Store an inline editor image and return its public URL.
     */
    public function store(UploadedFile $image, string $directory): string
    {
        $converted = WebpImage::convert($image);

        if ($converted === null) {
            throw new RuntimeException('The image could not be processed.');
        }

        $path = Storage::disk('public')->putFileAs(
            trim($directory, '/'),
            new File($converted),
            Str::random(40).'.webp',
        );

        if (! is_string($path)) {
            throw new RuntimeException('The image could not be stored.');
        }

        return Storage::disk('public')->url($path);
    }
}
