<?php

namespace App\Support;

class YouTubeVideo
{
    /**
     * Extract the 11 character video ID from a YouTube URL.
     */
    public static function videoId(?string $url): ?string
    {
        if (! is_string($url) || trim($url) === '') {
            return null;
        }

        $pattern = '~(?:youtube\.com/(?:watch\?(?:.*&)?v=|embed/|shorts/|live/)|youtu\.be/)([A-Za-z0-9_-]{11})~i';

        if (preg_match($pattern, $url, $matches) !== 1) {
            return null;
        }

        return $matches[1];
    }

    /**
     * Build a privacy friendly embed URL from a YouTube URL.
     */
    public static function embedUrl(?string $url): ?string
    {
        $videoId = self::videoId($url);

        return $videoId === null
            ? null
            : 'https://www.youtube-nocookie.com/embed/'.$videoId;
    }
}
