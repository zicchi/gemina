<?php

namespace App\Models;

use App\Helpers\Traits\ImageUploader;
use App\Helpers\Traits\ModelImageUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory,ModelImageUrl;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
