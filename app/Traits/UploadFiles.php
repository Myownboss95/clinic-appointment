<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait UploadFiles
{
    public function uploadImage(string $folder, Request $request): string
    {
        if (! $request->hasFile('image')) {
            return null;
        }

        $uploadedFile = $request->file('image');
        $filename = time().'_'.uniqid().'_'.$uploadedFile->getClientOriginalName();

        Storage::disk('public')->putFileAs(
            $folder,
            $uploadedFile,
            $filename
        );

        return (string) $filename;
    }
}
