<?php

namespace App\Helpers\Traits;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait ImageUploader
{

    private $_image_upload_path = "images";

    private function setImageUploadPath($path)
    {
        $this->_image_upload_path = $path;
    }

    private function uploadImage(Request $request, $inputName = "image", $width = 400, $height = 400, $skipThumbnail = false) {
        if ($request->hasFile($inputName))
        {
            $file = $request->file($inputName);

            if ($file->isValid())
            {

                // Store in local disk
                $filename = $file->store($this->_image_upload_path);

                // Store in the cloud
                Storage::disk('public')->put($filename, Storage::get($filename), [
                    'visibility' => 'public',
                ]);

                // Resize image as needed
                $this->imageResize($filename, $width, $height);

                // Create thumbnail
                if (!$skipThumbnail)
                {
                    Storage::disk('public')->putFileAs('thumb_'.$this->_image_upload_path, new File(config('filesystems.disks.local.root').'/'.$filename), basename($filename), [
                        'visibility' => 'public'
                    ]);
                }

                Log::debug("Image Upload: Image uploaded as $filename");

                return $filename;
            }

            Log::debug("Image Upload: Image file not valid");
            return false;
        }

        Log::debug("Image Upload: No image file.");
        return false;
    }

    private function uploadImageAsIs(Request $request, $inputName = "image")
    {
        if ($request->hasFile($inputName))
        {
            $file = $request->file($inputName);

            if ($file->isValid())
            {

                // Store in local disk
                $filename = $file->store($this->_image_upload_path);

                // Store in the cloud
                Storage::disk('public')->put($filename, Storage::get($filename), [
                    'visibility' => 'public',
                ]);

                Log::debug("[IMAGE_UPLOAD] Filename: $filename");

                return $filename;
            }

            return false;
        }

        return false;
    }

    private function imageResize($filename, $width, $height = null)
    {

        $path = storage_path('app/'.$filename);

        Log::debug("[IMAGE_RESIZE] Path: $path");

        Image::make($path)
            ->fit(400, 400, function($constraint) {
                $constraint->upsize();
            })
            ->save($path);

        return $path;

    }

}
