<?php

use Illuminate\Support\Facades\Storage;

if (! function_exists('file_url')) {
    function file_url($file, $disk = null)
    {
        if (starts_with($file, ['http', 'https'])) {
            return $file;
        }

        if (file_is_exists($file, $disk)) {
            return Storage::disk($disk)->url($file);
        }

        return null;
    }
}

if (! function_exists('file_delete')) {
    function file_delete($file, $disk = null)
    {
        return Storage::disk($disk)->delete($file);
    }
}

if (! function_exists('file_is_exists')) {
    function file_is_exists($file, $disk = null)
    {
        return Storage::disk($disk)->exists($file);
    }
}
