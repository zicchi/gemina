<?php

namespace App\Helpers\Traits;

use Illuminate\Support\Facades\Storage;

trait ModelImageUrl
{
    public function getImageUrlAttribute()
    {
        if ($this->image)
        {
            return Storage::disk('public')->url($this->image);
        }

        return "";
    }

    public function getThumbImageUrlAttribute()
    {
        if ($this->imageUrl)
        {
            return Storage::disk('public')->url('thumb_'.$this->image);
        }

        return "";
    }
}
