<?php

namespace App\Clients;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Spaces
{
    /**
     * When in production disk name is spaces
     *
     * Store file
     * @param string $path
     * @param mixed $file
     * @return string
     */
    public static function store(string $path, mixed $file): string
    {
        Storage::disk('spaces')->put(config('spaces.folder') . '/' . $path, $file, 'public');
        return $path . '/' . $file->hashName();
    }

    /**
     * Returns url to file from digitalocean space.
     * @param string|null $path
     * @param string $default
     * @return string
     */
    public static function url(string $path = null, string $default = ''): string
    {
        return $path ? config('spaces.url') . '/' . config('spaces.folder') . '/' . $path : $default;
    }

    public static function path(string $url = null)
    {
        return $url ? Str::replace(config('spaces.url') . '/' . config('spaces.folder') . '/', '', $url) : '';
    }

    /**
     * Check if file in storage exists
     * @param string $path
     * @return string
     */
    public static function exists(string $path): string
    {
        return Storage::disk('spaces')->exists($path);
    }

    /**
     * Delete file from storage
     * @param string|array $paths
     */
    public static function delete($paths)
    {
        $paths = is_array($paths) ? $paths : [$paths];

        $paths = array_filter($paths, function ($path) {
            return self::exists($path);
        });

        $paths = array_map(function ($path) {
            return $path;
        }, $paths);

        if (!$paths) {
            return;
        }

        Storage::disk('spaces')->delete($paths);
    }
}
