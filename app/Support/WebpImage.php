<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Spatie\Image\Image;
use Throwable;

class WebpImage
{
    private const QUALITY = 85;

    private const TEMP_DIRECTORY = 'media-webp';

    /**
     * Convert an uploaded or stored image to WebP and return the path to the
     * converted file. Returns the original path when the file is already
     * WebP, is not a convertible raster image, or the conversion fails.
     */
    public static function convert(UploadedFile|string|null $file): ?string
    {
        if ($file === null) {
            return null;
        }

        $path = $file instanceof UploadedFile ? $file->getRealPath() : $file;

        if (! is_string($path) || $path === '' || ! is_file($path)) {
            return is_string($file) ? $file : null;
        }

        $mime = self::mimeType($path);

        if (! in_array($mime, ['image/jpeg', 'image/png'], true)) {
            return $path;
        }

        $originalName = $file instanceof UploadedFile
            ? $file->getClientOriginalName()
            : basename($path);

        $targetPath = self::tempDirectory().'/'.
            Str::random(16).'-'.self::sanitizeName($originalName).'.webp';

        try {
            Image::load($path)
                ->format('webp')
                ->quality(self::QUALITY)
                ->save($targetPath);
        } catch (Throwable) {
            @unlink($targetPath);

            return $path;
        }

        self::purgeStaleFiles();

        return $targetPath;
    }

    private static function mimeType(string $path): string
    {
        $mimeType = @mime_content_type($path);

        return is_string($mimeType) ? $mimeType : '';
    }

    private static function sanitizeName(string $name): string
    {
        $name = pathinfo($name, PATHINFO_FILENAME);

        return (string) (preg_replace('/[^A-Za-z0-9._-]+/', '_', $name) ?: 'image');
    }

    private static function tempDirectory(): string
    {
        $directory = storage_path('app/'.self::TEMP_DIRECTORY);

        if (! is_dir($directory)) {
            @mkdir($directory, 0775, true);
        }

        return $directory;
    }

    private static function purgeStaleFiles(): void
    {
        $directory = self::tempDirectory();

        $files = @glob($directory.'/*.webp') ?: [];

        foreach ($files as $file) {
            if (is_file($file) && filemtime($file) < strtotime('-1 hour')) {
                @unlink($file);
            }
        }
    }
}
