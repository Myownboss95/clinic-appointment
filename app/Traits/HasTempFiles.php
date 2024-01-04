<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasTempFiles
{
    protected $tempfiles = [];

    protected function addTempFile(string $path)
    {
        $this->tempfiles[] = $path;
    }

    protected function deleteTempFiles($disk = null): void
    {
        $disk = ($disk == null)
            ? config('filesystems.default')
            : $disk;

        if (count($this->tempfiles)) {
            Storage::disk($disk)->delete($this->tempfiles);
        }
    }
}
